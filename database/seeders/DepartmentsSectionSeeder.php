<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\DepartmentsSection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DepartmentsSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DepartmentsSection::create([
            'title' => 'Departments',
            'subtitle' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit',
        ]);

        $items = [
            [
                'name' => 'Cardiology',
                'subtitle' => 'Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka',
                'description' => 'Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero',
                'image' => 'departments/cardiology-default.webp',
            ],
            [
                'name' => 'Neurology',
                'subtitle' => 'Provident nihil minus qui consequatur non omnis maiores eos accusantium',
                'description' => 'Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi. Ut aut reiciendis voluptatibus maiores alias consequatur.',
                'image' => 'departments/neurology-default.webp',
            ],
            [
                'name' => 'Hepatology',
                'subtitle' => 'Ut excepturi voluptatem nisi sed quidem fuga consequatur minus ea aut',
                'description' => 'Vel qui id voluptas adipisci eos earum corrupti. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus.',
                'image' => 'departments/hepatology-default.webp',
            ],
            [
                'name' => 'Pediatrics',
                'subtitle' => 'Cumque et suscipit saepe est maiores autem enim facilis ut aut ipsam',
                'description' => 'Corporis aut sed animi et autem ipsa. Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade.',
                'image' => 'departments/pediatrics-default.webp',
            ],
            [
                'name' => 'Eye Care',
                'subtitle' => 'Hic molestias ea quibusdam eos fugiat enim doloremque aut neque',
                'description' => 'Non et debitis iure corrupti recusandae. Non et temporibus minus omnis sed dolor esse consequatur cupiditate sed error.',
                'image' => 'departments/eye-care-default.webp',
            ],
        ];

        foreach ($items as &$item) {
            $filename = basename($item['image']);

            $source = database_path("seeders/images/{$filename}");
            $destination = "departments/{$filename}";

            Storage::disk('public')->put(
                $destination,
                file_get_contents($source)
            );
        }

        unset($item);

        foreach ($items as $item) {
            Department::create($item);
        }
    }
}
