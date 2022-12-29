<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Produit;
use Illuminate\Database\Seeder;
use Database\Seeders\CategoriesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Produit::factory(20)->create();
        //\App\Models\User::factory(10)->create();
        //  $this->call(CategoriesTableSeeder::class);
         User::factory(10)->create();
    }
}
