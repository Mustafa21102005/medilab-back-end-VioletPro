<?php

namespace App\Http\Controllers;

use App\Models\WhyChooseItem;
use App\Http\Requests\UpdateWhyChooseItemRequest;

class WhyChooseItemController extends Controller
{
    public function update(UpdateWhyChooseItemRequest $request, WhyChooseItem $whyChooseItem)
    {
        $validated = $request->validated();
        $newOrder = $validated['order'];

        unset($validated['order']);

        $whyChooseItem->update($validated);
        $whyChooseItem->moveToOrder($newOrder);

        return response()->json($whyChooseItem->fresh());
    }
}
