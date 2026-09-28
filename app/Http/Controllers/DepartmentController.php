<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\DepartmentsSection;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    public function index()
    {
        $section = DepartmentsSection::firstOrFail();

        $items = Department::get()->map(function ($item) {
            $item->image = $item->image
                ? Storage::disk('public')->url($item->image)
                : null;

            return $item;
        });

        return response()->json([
            'title' => $section->title,
            'subtitle' => $section->subtitle,
            'items' => $items,
        ]);
    }

    public function store(StoreDepartmentRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('departments', 'public');
        }

        return response()->json(Department::create($validated), 201);
    }

    public function show(Department $department)
    {
        $department->image = $department->image
            ? Storage::disk('public')->url($department->image)
            : null;

        return response()->json($department);
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $newImage = $request->file('image')->store('departments', 'public');

            if ($department->image) {
                Storage::disk('public')->delete($department->image);
            }

            $validated['image'] = $newImage;
        }

        $department->update($validated);

        return response()->json($department);
    }

    public function destroy(Department $department)
    {
        if ($department->doctors()->exists()) {
            return response()->json([
                'message' => 'You cannot delete this department because it still has doctors assigned to it.',
            ], 422);
        }

        if ($department->appointments()->exists()) {
            return response()->json([
                'message' => 'You cannot delete this department because it still has appointments.',
            ], 422);
        }

        if ($department->image) {
            Storage::disk('public')->delete($department->image);
        }

        $department->delete();

        return response()->json(null, 204);
    }
}
