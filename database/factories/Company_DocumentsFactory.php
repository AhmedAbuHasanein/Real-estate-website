<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Company_Documents;
use Illuminate\Database\Eloquent\Factories\Factory;

class Company_DocumentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company_Documents::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $companies_id = Company::all()->pluck('id')->toArray();
        return [
            'company_id' => $this->faker->randomElement($companies_id),
            'url' => 'asset/company_documents/document.jpg',
        ];
    }
}
