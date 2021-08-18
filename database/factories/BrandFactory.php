<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brand=$this->faker->unique()->words($nd=2,$astext=true);
        $slug=Str::slug($brand);
        return [
            'name'=>$brand,
            'slug'=>$slug
        ];
    }
}
