<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('department')->get();

        return response()->json([
            'doctors' => $doctors,
        ]);
    }

    public function store(StoreDoctorRequest $request)
    {
        $doctor = Doctor::create($request->validated());

        return response()->json($doctor, 201);
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->validated());

        return response()->json($doctor);
    }

    public function destroy(Doctor $doctor)
    {
        if ($doctor->appointments()->exists()) {
            return response()->json([
                'message' => 'You cannot delete this doctor because they still have appointments.',
            ], 422);
        }

        $doctor->delete();

        return response()->json(null, 204);
    }
}
