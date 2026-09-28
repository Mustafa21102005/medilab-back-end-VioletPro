<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Http\Requests\UpdateHeroSectionRequest;
use App\Models\WhyChooseItem;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    public function index()
    {
        $hero = HeroSection::firstOrFail();
        $items = WhyChooseItem::orderBy('order')->get();

        return response()->json([
            'main_title' => $hero->main_title,
            'subtitle' => $hero->subtitle,
            'why_choose_title' => $hero->why_choose_title,
            'why_choose_text' => $hero->why_choose_text,
            'background_image' => $hero->background_image
                ? Storage::disk('public')->url($hero->background_image)
                : null,
            'why_choose_items' => $items,
        ]);
    }

    public function update(UpdateHeroSectionRequest $request)
    {
        $hero = HeroSection::firstOrFail();

        $validated = $request->validated();

        if ($request->hasFile('background_image')) {
            if ($hero->background_image) {
                Storage::disk('public')->delete($hero->background_image);
            }

            $path = $request
                ->file('background_image')
                ->store('hero_background_image', 'public');

            $validated['background_image'] = $path;
        }

        $hero->update($validated);

        return response()->json([
            ...$hero->toArray(),
            'background_image' => $hero->background_image
                ? Storage::disk('public')->url($hero->background_image)
                : null,
        ]);
    }
}
