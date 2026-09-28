<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServicesSection;
use Illuminate\Database\Seeder;

class ServicesSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServicesSection::create([
            'title' => 'Services',
            'subtitle' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.',
        ]);

        $items = [
            [
                'icon' => 'heart-pulse',
                'title' => 'Nesciunt Mete',
                'description' => 'Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.',
                'order' => 1
            ],
            [
                'icon' => 'pill',
                'title' => 'Eosle Commodi',
                'description' => 'Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.',
                'order' => 2
            ],
            [
                'icon' => 'hospital',
                'title' => 'Ledo Markt',
                'description' => 'Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.',
                'order' => 3
            ],
            [
                'icon' => 'dna',
                'title' => 'Asperiores Commodit',
                'description' => 'Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci.',
                'order' => 4
            ],
            [
                'icon' => 'accessibility',
                'title' => 'Velit Doloremque',
                'description' => 'Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi et autem ipsa.',
                'order' => 5
            ],
            [
                'icon' => 'heart-plus',
                'title' => 'Dolori Architecto',
                'description' => 'Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae.',
                'order' => 6
            ],
        ];

        foreach ($items as $item) {
            Service::create($item);
        }
    }
}
