<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::factory(20)->create();

        $this->call([
            CompanySeeder::class,
            JobSeeder::class,
        ]);
    }
}
