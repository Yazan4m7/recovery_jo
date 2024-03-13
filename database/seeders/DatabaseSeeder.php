<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if (DB::table('categories')->count() == 0) {

            DB::table('categories')->insert([
            
                    ['name' => 'Dress'],
               
                    ['name' => 'T-shirt'],
               
                    ['name' => 'Shoes'],
               
                    ['name' => 'Coats'],
               
                    ['name' => 'Jeans'],

            ]);
        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }
    }
}

