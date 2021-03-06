<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roleArray = ['admin', 'editor', 'customer'];
        for($i = 0; $i<3; $i++)
        {
            DB::table('roles')->insert(['name'=> $roleArray[$i]]);
        }
        \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\Order::factory(10)->create();
        \App\Models\OrderDetail::factory(100)->create();
    }
}
