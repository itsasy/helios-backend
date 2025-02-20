<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Department::factory('10')->create()->each(function (Department $department) {
            Department::factory(rand(2, 5))->create([
                'parent_id' => $department->id
            ]);
        });
    }
}
