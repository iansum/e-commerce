<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();

        $product_name = $faker->unique()->words($nb=4, $asTest=true);
        $slug = Str::slug($product_name);
        $category_name = $faker->randomElement(['smartphone', 'laptop', 'tablet', 'mouse', 'keyboard']);


        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_description' => $faker->text(50),
            'description' => $faker->text(50),
            'regular_price' => $faker->numberBetween(100, 200),
            'sale_price' => $faker->numberBetween(50, 90),
            'SKU' => 'DIGI' .  $faker->unique()->numberBetween(100, 500),
            'stock_status' => 'instock',
            'quantity' => $faker->numberBetween(100, 200),
            'image' => $category_name . '.jpg',
            'category_name' => $category_name
        ]; 
    }
}
