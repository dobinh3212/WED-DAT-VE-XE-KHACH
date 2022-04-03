<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Flash;

class ChangePasswordController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changePassword()
    {
        return view('auth.changepassword');
    }

    public function updatePassword(Request $request)
    {
        $user = Users::find(auth()->user()->id);
        $oldPass=$request->oldPassword;
        if (Hash::check($oldPass, $user->password)) {
            $correctPasswordConfirm = $request->newPassword === $request->newPasswordConfirm;
            if ($correctPasswordConfirm) {
                $user->password = Hash::make($request->newPassword);
                $user->save();
                Flash::success("Đổi mật khẩu thành công ! ");
                return redirect()->back();
            } else {
                Flash::error('Nhập lại mật khẩu mới không khớp !');
                return redirect()->back();
            }
        } else {
            Flash::error('Nhập sai mật khẩu cũ !');
            return redirect()->back();
        }
    }
}
