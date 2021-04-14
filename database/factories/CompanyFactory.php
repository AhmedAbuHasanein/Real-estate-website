<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Admin;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $bol =true;
        while ($bol) {
            $array_id = Account::all()->pluck('id')->toArray();
            $id = $this->faker->unique()->randomElement($array_id);
            if(Admin::all()->where('account_id','=',$id)->isEmpty()
                & (User::all()->where('account_id','=',$id)->isEmpty()
                    & Company::all()->where('account_id','=',$id)->isEmpty())){
                $bol =false;
            }


        }
        return [
            'account_id' => $id,
            'Company_name' => $this->faker->company,
            'ssid' => $this->faker->unique()->ean8,
            'score' => $this->faker->numberBetween(1,100) ,

        ];
    }
}
