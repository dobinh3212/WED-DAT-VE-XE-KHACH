<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\Users;
use Mail;
use Hash;
use Illuminate\Support\Str;
use Flash;

class ForgotPasswordController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view('auth.forgetPassword');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers',
        ]);

        $token = Str::random(64);
        $email = $request->email;
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('auth.emails.forgetPassword', ['token' => $token, 'email' => $email],  function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        Flash::success('Chúng tôi đã gửi qua e-mail liên kết đặt lại mật khẩu của bạn!');
        return back();
    }
    public function showResetPasswordForm($token, $email)
    {

        return view('auth.forgetPasswordLink', ['token' => $token, 'email' => $email]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            Flash::error('Mã không hợp lệ!');
            return back()->withInput();
        }

        Customer::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();
        Flash::success('Mật khẩu của bạn đã được thay đổi!');
        return redirect('/');
    }
}
