<?php

namespace App\Http\Controllers;

use App\Models\AboutFeature;
use App\Http\Requests\UpdateAboutFeatureRequest;

class AboutFeatureController extends Controller
{
    public function update(UpdateAboutFeatureRequest $request, AboutFeature $aboutFeature)
    {
        $validated = $request->validated();
        $newOrder = $validated['order'];

        unset($validated['order']);

        $aboutFeature->update($validated);
        $aboutFeature->moveToOrder($newOrder);

        return response()->json($aboutFeature->fresh());
    }
}
