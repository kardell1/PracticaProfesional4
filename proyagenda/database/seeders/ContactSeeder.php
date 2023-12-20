<?php

namespace Database\Seeders;

use App\Models\Email;
use App\Models\Phone;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Tag::factory(5)->create();
        Phone::factory(10)->create();
        Email::factory(10)->create();
    }
}
