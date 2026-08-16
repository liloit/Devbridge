<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrator TU',
            'email' => 'admin@mankeerom.sch.id',
            'password' => bcrypt('password'),
            'role' => 'admin_tu',
            'phone' => '081234567890',
        ]);

        User::factory()->create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepsek@mankeerom.sch.id',
            'password' => bcrypt('password'),
            'role' => 'principal',
            'phone' => '081234567891',
        ]);

        User::factory()->create([
            'name' => 'Pemohon (Applicant)',
            'email' => 'applicant@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'applicant',
            'phone' => '081234567892',
        ]);
    }
}
