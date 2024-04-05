<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'sohaib',
        //     'email' => 'sohaib@gmail.com',
        //     'password' => bcrypt('123456'),
        //     'phone' => '123456789',
        //     'address' => 'address',
            
        //     'utype' => 'admin',
        // ]);
        
            // \App\Models\Brand::factory(4)->create();
            // \App\Models\Category::factory(6)->create();
            \App\Models\Product::factory(10)->create();

            // User::create([
            //     'name' => 'Super',
            //     'phone' => '123456789',
            //     'email' => 'admin@gmail.com',
            //     'password' => Hash::make('123456789'),
            //     'utype' => 'ADM'
            // ]);
            // User::create([
            //     'name' => 'Test',
            //     'phone' => '0642548487',
            //     'email' => 'test@gmail.com',
            //     'password' => Hash::make('123456789'),
            //     'utype' => 'USR'
            // ]);
            // $this->call(BrandSeeder::class);
    }
}
