<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Realestate;
use App\Models\Realestate_type;
use Illuminate\Database\Eloquent\Factories\Factory;

class RealestateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Realestate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['متاح','غير متاح'];
        $companies_id = Company::all()->pluck('id') ;
        $realestate_type_id = Realestate_type::all()->pluck('id');
        return [
            'description' => $this->faker->text(200),
            'space' => $this->faker->numberBetween(100,1000),
            'price' => $this->faker->numberBetween(100,1000),
            'address' => $this->faker->address,
            'status' => $this->faker->randomElement($status),
            'company_id' => $this->faker->randomElement($companies_id),
            'realestate_type_id' => $this->faker->randomElement($realestate_type_id),
            'main_image' => 'asset\visitor\img\francesca-tosolini-XcVm8mn7NUM-unsplash.jpg',
            'type' => $this->faker->randomElement(['بيع','إيجار']),

        ];
    }
}
