<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Customer;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
        return Validator::make($data, [
            'phone' => 'required|string|max:255|regex:#\+7\(\d{3}\) \d{3}-\d{2}-\d{2}#|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $phone = $data['phone'];
        $email = $data['email'];

        $user = User::create([
            'phone' => $phone,
            'email' => $email,
            'password' => bcrypt($data['password']),
            'role_id' => 1
        ]);

        $customer = Customer::where([
            ['phone', '=', $phone],
            ['email', '=', $email]
        ])->first();

        if ($customer == null) {
            $customer = new Customer();
            $customer->phone = $phone;
            $customer->email = $email;
        }

        $customer->user_id = $user->id;
        $customer->save();

        return $user;
    }

    public function showRegistrationForm()
    {
        $categories = Category::all();
        return view('auth.register', ['categories' => $categories]);
    }
}
