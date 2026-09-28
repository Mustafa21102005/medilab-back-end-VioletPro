<?php

namespace App\Http\Controllers;

use App\Models\AppointmentSection;
use App\Http\Requests\UpdateAppointmentSectionRequest;
use App\Models\Appointment;

class AppointmentSectionController extends Controller
{
    public function index()
    {
        $section = AppointmentSection::first();
        $appointments = Appointment::with(['department', 'doctor'])
            ->orderBy('created_at')
            ->get();

        return response()->json([
            'title' => $section->title,
            'subtitle' => $section->subtitle,
            'appointments' => $appointments
        ]);
    }

    public function update(UpdateAppointmentSectionRequest $request)
    {
        $appointmentSection = AppointmentSection::firstOrFail();

        $appointmentSection->update($request->validated());

        return response()->json($appointmentSection);
    }
}
