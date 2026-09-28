<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use App\Models\WhyChooseItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $source = database_path('seeders/images/hero-default.jpg');

        $destination = 'hero_background_image/hero-default.jpg';

        Storage::disk('public')->put(
            $destination,
            file_get_contents($source)
        );

        HeroSection::create([
            'main_title' => 'WELCOME TO MEDILAB',
            'subtitle' => 'We are team of talented designers making websites with Bootstrap.',
            'why_choose_title' => 'Why Choose Medilab?',
            'why_choose_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.',
            'background_image' => $destination,
        ]);

        $items = [
            [
                'icon' => 'chart',
                'title' => 'Corporis voluptates',
                'description' => 'Ut autem aut autem non a. Sint sint sit facilis nam iusto sint.',
                'order' => 1
            ],
            [
                'icon' => 'gem',
                'title' => 'Ullamco laboris',
                'description' => 'Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.',
                'order' => 2
            ],
            [
                'icon' => 'stethoscope',
                'title' => 'Labore consequatur',
                'description' => 'Cum sociis natoque penatibus et magnis dis parturient.',
                'order' => 3
            ],
        ];

        foreach ($items as $item) {
            WhyChooseItem::create($item);
        }
    }
}
