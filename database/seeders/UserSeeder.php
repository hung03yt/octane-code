<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->hasProducts(5)
            ->create();

        User::factory()
            ->count(30)
            ->hasProducts(2)
            ->create();

        User::factory()
            ->count(50)
            ->create();
    }
}
