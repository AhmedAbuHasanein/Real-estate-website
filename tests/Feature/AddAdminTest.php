<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddAdminTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function can_add_admin()
    {  $this->withoutExceptionHandling();
        $account = Account::factory()->create();
        $this->actingAs($account);
        $attributes = [
            'grade' => 5,
            'first_name' => 'Test first name',
            'last_name' =>  'Test first name',
            'country' => 'فلسطين',
            'gender' => 'ذكر',
            'dob' =>'17/5/1999',
            'address_1' =>'palestine gaza',
            'phone_number' => '0597846301',
            'user_name' => 'Test Admin',
            'email'=> 'Test@admin.com',
            'password' => 'Test Password',
        ];
        $count_before = Admin::all()->count();
        $this->post(route('admin_add_admin',$account),$attributes)
            ->assertSessionHas('success','تم إضافة مشرف بنجاح');
        $count_after = Admin::all()->count();
        $this->assertEquals(++$count_before, $count_after);
    }
}
