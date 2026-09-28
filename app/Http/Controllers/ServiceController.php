<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\ServicesSection;

class ServiceController extends Controller
{
    public function index()
    {
        $section = ServicesSection::first();
        $items = Service::orderBy('order')->get();

        return response()->json([
            'title' => $section->title,
            'subtitle' => $section->subtitle,
            'items' => $items,
        ]);
    }

    public function store(StoreServiceRequest $request)
    {
        $validated = $request->validated();

        Service::makeRoomAtOrder($validated['order']);

        return response()->json(Service::create($validated), 201);
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $validated = $request->validated();
        $newOrder = $validated['order'];

        unset($validated['order']);

        $service->update($validated);
        $service->moveToOrder($newOrder);

        return response()->json($service->fresh());
    }

    public function destroy(Service $service)
    {
        $service->delete();

        Service::reorder();

        return response()->json(null, 204);
    }
}
