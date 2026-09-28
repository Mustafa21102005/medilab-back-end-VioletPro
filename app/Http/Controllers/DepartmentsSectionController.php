<?php

namespace App\Http\Controllers;

use App\Models\DepartmentsSection;
use App\Http\Requests\UpdateDepartmentsSectionRequest;

class DepartmentsSectionController extends Controller
{
    public function update(UpdateDepartmentsSectionRequest $request)
    {
        $departmentSection = DepartmentsSection::firstOrFail();

        $departmentSection->update($request->validated());

        return response()->json($departmentSection);
    }
}
