<?php

namespace App\Http\Controllers;

use App\Models\Stat;
use App\Http\Requests\StoreStatRequest;
use App\Http\Requests\UpdateStatRequest;

class StatController extends Controller
{
    public function index()
    {
        return Stat::orderBy('order')->get();
    }

    public function store(StoreStatRequest $request)
    {
        $validated = $request->validated();

        Stat::makeRoomAtOrder($validated['order']);

        return response()->json(Stat::create($validated), 201);
    }

    public function update(UpdateStatRequest $request, Stat $stat)
    {
        $validated = $request->validated();
        $newOrder = $validated['order'];

        unset($validated['order']);

        $stat->update($validated);
        $stat->moveToOrder($newOrder);

        return response()->json($stat->fresh());
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();

        Stat::reorder();

        return response()->json(null, 204);
    }
}
