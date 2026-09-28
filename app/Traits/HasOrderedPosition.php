<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

/**
 * @property int $id
 * @property int $order
 */
trait HasOrderedPosition
{
    public static function makeRoomAtOrder(int $order): void
    {
        static::where('order', '>=', $order)->increment('order');
    }

    public function moveToOrder(int $newOrder): void
    {
        $oldOrder = $this->order;

        if ($newOrder === $oldOrder) {
            return;
        }

        DB::transaction(function () use ($newOrder, $oldOrder) {
            if ($newOrder > $oldOrder) {
                static::where('id', '!=', $this->id)
                    ->whereBetween('order', [$oldOrder + 1, $newOrder])
                    ->decrement('order');
            } else {
                static::where('id', '!=', $this->id)
                    ->whereBetween('order', [$newOrder, $oldOrder - 1])
                    ->increment('order');
            }

            $this->order = $newOrder;
            $this->save();
        });
    }

    public static function reorder(): void
    {
        static::orderBy('order')
            ->orderBy('id')
            ->get()
            ->each(function ($item, $index) {
                $item->update([
                    'order' => $index + 1,
                ]);
            });
    }
}
