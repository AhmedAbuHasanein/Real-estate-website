<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Admin;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

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
            'grade' => $this->faker->randomElement([2,3,4]) ,
            'add_admin' => $this->faker->randomElement([true,false]) ,
            'update_admin' => $this->faker->randomElement([true,false]),
             'delete_admin' => $this->faker->randomElement([true,false]),
            'show_admin' => $this->faker->randomElement([true,false]),
             'add_realestate_type' => $this->faker->randomElement([true,false]),
            'update_realestate_type' => $this->faker->randomElement([true,false]),
            'delete_realestate_type' => $this->faker->randomElement([true,false]),
             'show_realestate_type' => $this->faker->randomElement([true,false]),
            'delete_realestate' => $this->faker->randomElement([true,false]),
             'show_realestate' => $this->faker->randomElement([true,false]),
            'show_company' => $this->faker->randomElement([true,false]),
             'delete_company' => $this->faker->randomElement([true,false]),
             'show_user' => $this->faker->randomElement([true,false]),
             'delete_user' => $this->faker->randomElement([true,false]),


        ];
    }
}
