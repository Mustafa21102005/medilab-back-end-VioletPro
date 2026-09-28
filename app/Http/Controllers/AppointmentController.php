<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;

class AppointmentController extends Controller
{
    public function index()
    {
        return Appointment::with(['department', 'doctor'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function store(StoreAppointmentRequest $request)
    {
        $appointment = Appointment::create($request->validated());

        return response()->json($appointment, 201);
    }

    public function show(Appointment $appointment)
    {
        return $appointment->load(['department', 'doctor']);
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->validated());

        return response()->json($appointment->fresh()->load(['department', 'doctor']));
    }

    public function markAsRead(Appointment $appointment)
    {
        $appointment->update(['is_read' => true]);

        return response()->json($appointment->fresh());
    }

    public function markAsUnread(Appointment $appointment)
    {
        $appointment->update(['is_read' => false]);

        return response()->json($appointment->fresh());
    }

    public function destroy(Appointment $appointment)
    {
        if ($appointment->doctor()->exists()) {
            return response()->json([
                'message' => 'You cannot delete this appointment because it still has a doctor assigned to it.',
            ], 422);
        }

        if ($appointment->department()->exists()) {
            return response()->json([
                'message' => 'You cannot delete this appointment because it still has a department assigned to it.',
            ], 422);
        }

        $appointment->delete();

        return response()->json(null, 204);
    }
}
