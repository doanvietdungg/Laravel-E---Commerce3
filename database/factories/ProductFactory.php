<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {

        $product=$this->faker->unique()->words($nb=4,$asText=true);
        $slug=Str::slug($product);
        return [
            'name'=>$product,
            'slug'=>$slug,
            'short_description'=>$this->faker->text(200),
            'descriptions'=>$this->faker->text(500),
            'regular_price'=>$this->faker->numberBetween(10,500),
            'SKU'=>'DIGI'.$this->faker->unique->numberBetween(100,500),
            'stock_status'=>'instock',
            'quanity'=>$this->faker->numberBetween(10,500),
            'image'=>'digital_' . $this->faker->unique()->numberBetween(1,22).'.jpg',
            'category_id'=>$this->faker->numberBetween(1,5),
           
        ];
    }
}
