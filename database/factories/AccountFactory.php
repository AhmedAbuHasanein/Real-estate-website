<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     * @Faker
     * @return array
     */
    public function definition()
    {
        return [
            'user_name' => $this->faker->unique()->userName ,
            'email' =>  $this->faker->unique()->safeEmail,
            'password' => Hash::make( $this->faker->password),
            'remember_token' =>Str::random(10),

        ];
    }
}
