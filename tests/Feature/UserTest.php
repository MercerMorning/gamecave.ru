<?php

namespace Tests\Feature;

use App\Modules\Pub\Front\Controllers\Auth_old\RegisterController;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use PHPUnit\

//class UserTest extends TestCase
class UserTest extends
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
//    public function testSaveInBase()
//    {
//        echo 'validate all signed';
//        $test = ['name' => 'Дейл', 'password' => 'плохойпароль', 'email' => 'email@example.com'];
//        $validator = Validator::make($test,
//            array(
//                'name' => ['required', 'string', 'max:255'],
//                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//                'password' => ['required', 'string', 'min:8', 'confirmed'],
//            )
//        );
//        $register = new RegisterController();
//        $result = $register->validate($test, $validator, 'not valid');
//        $this->assertTrue($result, 'not valid');
//
//        $register->validateWith($validator);
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
    public function __construct()
    {
        $this->create
    }

    public function testSaveInBase()
    {
        $user = new User();
        $user->name = 'example2';
        $user->email = 'example2@mail.ru';
        $user->password = 'example2';
        $this->assertTrue($user->save(), 'model saved!');
    }
}
