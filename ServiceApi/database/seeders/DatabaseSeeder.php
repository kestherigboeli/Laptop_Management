<?php

namespace Database\Seeders;

use App\Models\Accessory;
use App\Models\Brand;
use App\Models\Laptop;
use App\Models\Loan;
use App\Models\Request;
use App\Models\User;
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
         User::factory(10)->create();
         Accessory::factory(10)->create();
         Request::factory(10)->create();
         Laptop::factory(10)->create();
        Loan::factory(10)->create();
        Brand::factory(10)->create();
    }
}
