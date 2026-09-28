<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'Cardiology' => Department::firstOrCreate(
                ['name' => 'Cardiology'],
                [
                    'subtitle' => 'Heart and cardiovascular care',
                    'description' => 'Diagnosis and treatment of heart and cardiovascular conditions.',
                    'image' => 'cardiology.jpg',
                    'order' => 1,
                ]
            ),
            'Neurology' => Department::firstOrCreate(
                ['name' => 'Neurology'],
                [
                    'subtitle' => 'Brain and nervous system care',
                    'description' => 'Diagnosis and treatment of neurological disorders.',
                    'image' => 'neurology.jpg',
                    'order' => 2,
                ]
            ),
            'Pediatrics' => Department::firstOrCreate(
                ['name' => 'Pediatrics'],
                [
                    'subtitle' => 'Healthcare for children',
                    'description' => 'Medical care for infants, children, and adolescents.',
                    'image' => 'pediatrics.jpg',
                    'order' => 3,
                ]
            ),
        ];

        $doctors = [
            [
                'name' => 'Dr. Maria Gomez',
                'department_id' => $departments['Cardiology']->id,
            ],
            [
                'name' => 'Dr. Sarah Lee',
                'department_id' => $departments['Neurology']->id,
            ],
            [
                'name' => 'Dr. James Carter',
                'department_id' => $departments['Pediatrics']->id,
            ],
        ];

        foreach ($doctors as $doctor) {
            Doctor::firstOrCreate(['name' => $doctor['name']], ['department_id' => $doctor['department_id']]);
        }
    }
}
