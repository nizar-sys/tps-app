<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\District;
use App\Models\Logistic;
use App\Models\Region;
use App\Models\Support;
use App\Models\Tps;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
        Region::factory(4)->create();
        District::factory(20)->create();
        Village::factory(20)->create();
        Tps::factory(20)->create();
        Support::factory(60)->create();
        Logistic::factory(10)->create();
    }
}
