<?php

namespace Database\Seeders;

use App\Models\Stat;
use Illuminate\Database\Seeder;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'icon' => 'users',
                'value' => 85,
                'label' => 'Doctors',
                'order' => 1
            ],
            [
                'icon' => 'building',
                'value' => 18,
                'label' => 'Departments',
                'order' => 2
            ],
            [
                'icon' => 'flask',
                'value' => 12,
                'label' => 'Research Labs',
                'order' => 3
            ],
            [
                'icon' => 'award',
                'value' => 150,
                'label' => 'Awards',
                'order' => 4
            ],
        ];

        foreach ($stats as $stat) {
            Stat::create($stat);
        }
    }
}
