<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brand_name = $this->faker->randomElement(['Samsung', 'Apple', 'Huawei', 'Xiaomi', 'OnePlus']);
        $image_name = $this->faker->numberBetween(1,5) . '.jpg';
        $image_path = '/storage/assets/images/fashion/product/front/' . $image_name;
        $slug = Str::slug($brand_name);
        return [
            'name' => Str::title($brand_name),
            'slug'=>$slug,
            'image' => $image_path,
        ];
    }
}
