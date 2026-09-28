<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateServicesSectionRequest;
use App\Models\ServicesSection;

class ServicesSectionController extends Controller
{
    public function update(UpdateServicesSectionRequest $request)
    {
        $servicesSection = ServicesSection::firstOrFail();

        $servicesSection->update($request->validated());

        return response()->json($servicesSection);
    }
}
