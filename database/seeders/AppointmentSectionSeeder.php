<?php

namespace Database\Seeders;

use App\Models\AppointmentSection;
use Illuminate\Database\Seeder;

class AppointmentSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppointmentSection::create([
            'title' => 'Appointment',
            'subtitle' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.',
        ]);
    }
}
