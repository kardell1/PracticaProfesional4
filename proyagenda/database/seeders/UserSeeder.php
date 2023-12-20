<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * esta es otra forma de llenar un dato con el modelo 
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'password' => bcrypt('admin')
        ]);
        User::factory(10)->create();
    }
}
