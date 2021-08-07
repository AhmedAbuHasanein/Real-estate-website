<?php

namespace Database\Factories;

use App\Models\Realestate;
use App\Models\RealEstateDocuments;
use Illuminate\Database\Eloquent\Factories\Factory;

class RealEstateDocumentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RealEstateDocuments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $realestates_id = Realestate::all()->pluck('id')->toArray();
        return [
            'realestate_id' => $this->faker->randomElement($realestates_id),
            'url' => 'asset/realestate_documents/document.jpeg',
        ];
    }
}
