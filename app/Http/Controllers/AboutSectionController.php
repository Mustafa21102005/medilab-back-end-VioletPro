<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Http\Requests\UpdateAboutSectionRequest;
use App\Models\AboutFeature;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    public function index()
    {
        $about = AboutSection::first();
        $features = AboutFeature::orderBy('order')->get();

        return response()->json([
            'title' => $about->title,
            'description' => $about->description,
            'media_url' => $about->media_url,
            'image' => $about->image
                ? Storage::disk('public')->url($about->image)
                : null,
            'features' => $features,
        ]);
    }

    public function update(UpdateAboutSectionRequest $request)
    {
        $validated = $request->validated();

        $aboutSection = AboutSection::firstOrFail();

        if ($request->hasFile('image')) {
            if ($aboutSection->image) {
                Storage::disk('public')->delete($aboutSection->image);
            }
            $validated['image'] = $request->file('image')->store('about', 'public');
        }

        $aboutSection->update($validated);

        return response()->json($aboutSection->fresh());
    }
}
