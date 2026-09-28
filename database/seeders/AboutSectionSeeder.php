<?php

namespace Database\Seeders;

use App\Models\AboutFeature;
use App\Models\AboutSection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $source = database_path('seeders/images/about-image.webp');

        $destination = 'about/about-image.webp';

        Storage::disk('public')->put(
            $destination,
            file_get_contents($source)
        );

        AboutSection::create([
            'title' => 'About Us',
            'description' => 'Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas deleniti. Sit quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam ut eius incidunt reiciendis veritatis asperiores placeat.',
            'media_url' => 'https://www.youtube.com/embed/mUzq_h1GCXE?si=88yQHhqKJwS71w2Z',
            'image' => $destination,
        ]);

        $features = [
            [
                'icon' => 'test-tube',
                'title' => 'Ullamco laboris nisi ut aliquip consequat',
                'description' => 'Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade.',
                'order' => 1
            ],
            [
                'icon' => 'pill-bottle',
                'title' => 'Magnam soluta odio exercitationem reprehenderi',
                'description' => 'Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi.',
                'order' => 2
            ],
            [
                'icon' => 'hand-heart',
                'title' => 'Voluptatem et qui exercitationem',
                'description' => 'Et velit et eos maiores est tempora et quos dolorem autem tempora incidunt maxime veniam.',
                'order' => 3
            ],
        ];

        foreach ($features as $feature) {
            AboutFeature::create($feature);
        }
    }
}
