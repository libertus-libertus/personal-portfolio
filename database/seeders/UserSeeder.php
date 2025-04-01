<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Libertus',
            'email' => 'libert.jobs@gmail.com',
            'phone_number' => '081346111649',
            'password' => Hash::make('Libertus@2o2n@')
        ]);
    }
}
