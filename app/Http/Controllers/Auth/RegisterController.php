<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/home';

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
        $data = Validator::make($data, [
            'userName' => ['required', 'min: 1', 'max: 10'],
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_sim' => ['required', 'min: 12', 'max:14'],
            'no_telp' => 'required',
        ]);

        if($data->fails()){
            return redirect()->route('register');
        }

        return $data;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'userID' => $data['userName'],
            'name' => $data['name'],
            'alamat' => $data['alamat'],
            'no_sim' => $data['no_sim'],
            'no_telp' => $data['no_telp'],
            'email' => $data['email'],
            'status' => 'Users',
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request){
        $this->validator($request->all());
        $user = $this->create($request->all());
        if($user){
            return redirect()->route('login')
            ->with('success', 'Data berhasil diregistrasi!');
        }
    }
}
