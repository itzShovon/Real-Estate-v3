<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

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
    // protected $redirectTo = '/home';
    protected $redirectTo = '/dashboard';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contact' => ['required', 'string'],
            'category' => ['required', 'string'],
            'address' => ['required', 'string'],
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10300'],
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
        $request = request();
        $avatarName = 'users/' . uniqid() . '/' . $request->avatar->getClientOriginalName();
        $path = $request->file('avatar')->storeAs('public', $avatarName);
        $image = Image::make(getcwd() . '/storage/' . $avatarName)->fit(500, 500)->save(getcwd() . '/storage/' . $avatarName, 60);

        $role_id = DB::table('roles')->where('name', 'user')->select('id')->first();

        return User::create([
            'role_id' => $role_id->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'contact' => $data['contact'],
            'category' => $data['category'],
            'address' => $data['address'],
            'avatar' => $avatarName,
            'status' => true,
        ]);


    }
}
