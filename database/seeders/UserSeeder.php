<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->f_name = 'admin';
        $user->l_name = 'admin';
        $user->gender = 'male';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('12345678');
        $user->department_id = 1;
        $user->save();

        $user->assignRole('admin');
    }
}
