<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Setings;
use App\Models\Users;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],);
    }
    protected function create(array $data)
    {
        $role = Setings::where('key', 'role_user')->select('value')->first();
        $value_role = $role->value;

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $value_role,
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),

        ]);
    }
}
