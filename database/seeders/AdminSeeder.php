<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super = Admin::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
        ]);

        $super->assignRole('Super Admin');
    }
}
