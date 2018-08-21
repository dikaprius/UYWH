<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $message =[
          'reg_name.required' => 'Please Enter Your Name',
          'reg_password.required' => 'Please Enter Your Password',
          'max'                  => [
              'numeric' => 'Name may not be greater than :max.',
              'file'    => 'Name may not be greater than :max kilobytes.',
              'string'  => 'Name may not be greater than :max characters.',
              'array'   => 'Name may not have more than :max items.',
              ],
          'reg_password.confirmed' => 'Password confirmation does not match.',
          'min'                  => [
              'numeric' => 'Password must be at least :min.',
              'file'    => 'Password must be at least :min kilobytes.',
              'string'  => 'Password must be at least :min characters.',
              'array'   => 'Password must have at least :min items.',
              ],
           'email_registration.required' => 'Please Enter Your E-mail',
           'email_registration.email' => 'E-mail must be a valid email address',
           'email_registration.unique' => 'E-mail has already been taken',
          ];

        return Validator::make($data, [
            'reg_name' => 'required|string|max:200',
            'email_registration' => 'required|unique:users,email',
            'reg_password' => 'required|string|min:6|confirmed',

        ], $message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['reg_name'],
            'email' => $data['email_registration'],
            'password' => Hash::make($data['reg_password']),
            'birthdate' => date("Y:m:d", strtotime(request('birthdate'))),
            'phone_number' => $data['phone_number'],
            'role' => 1,
        ]);
    }



    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
