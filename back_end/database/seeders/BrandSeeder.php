<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['Samsung', 'Apple', 'Huawei', 'Xiaomi', 'OnePlus'];

        foreach($brands as $brand){
            $image_name = random_int(1,5) . '.jpg';
            $image_path = '/storage/assets/images/fashion/product/front/' . $image_name;
            Brand::create([
                'name'=> $brand,
                'slug'=>$brand,
                'image' => $image_path,
            ]);
        }
        //
    }
}
