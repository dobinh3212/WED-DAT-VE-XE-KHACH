<?php

namespace App\Http\Controllers\Auth\Customer;

use Auth;
use App\Customer;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Jrean\UserVerification\Facades\UserVerification;
use Illuminate\Auth\Events\Registered;
use App\Events\CompanyRegistered;
use Illuminate\Support\Str;

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
    protected $userTable = 'companies';
    protected $redirectIfVerified = '/company-home';
    protected $redirectAfterVerification = '/company-home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('customer.guest', ['except' => ['getVerification', 'getVerificationError']]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('customer');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],);
    }
    public function register(Request $request)
    {
        if (!empty(Customer::where('email', $request->input('email'))->first())) {
            $thongbao = 'Đăng ký thất bại - Email đã được sử dụng!';
            session_start();
            $_SESSION['thongbao'] = $thongbao;
            return redirect(url()->previous());
        }
        if ($request->input('password') == $request->input('password_confirmation')) {
            $customer = new Customer();
            $customer->name = $request->input('name');
            $customer->phone = $request->input('phone');
            $customer->email = $request->input('email');
            $customer->password = Hash::make($request->input('password'));
            $customer->date_birth = $request->input('date_birth');
            $customer->save();
            /*         * ******************** */
            $customer->update();
            /*         * ******************** */
            $this->guard()->login($customer);
            return $this->registered($request, $customer) ?: redirect($this->redirectPath());
        } else {
            $thongbao = 'Đăng ký thất bại - xác nhận mật khẩu phải giống nhau!';
            session_start();
            $_SESSION['thongbao'] = $thongbao;
            return redirect(url()->previous());
        }
    }
}
