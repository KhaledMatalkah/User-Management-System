<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = new Department();
        $department->name = 'IT Department';
        $department->save();

        $department = new Department();
        $department->name = 'Accountant Department';
        $department->save();
    }
}
