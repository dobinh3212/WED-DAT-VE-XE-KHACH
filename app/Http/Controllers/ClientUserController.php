<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientUserRequest;
use App\Http\Requests\UpdateAccountUserRequest;
use App\Http\Requests\UpdatePostCategoryRequest;
use App\Models\Customer;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Users;
use App\Repositories\PostCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;


class ClientUserController extends Controller
{
    public function showForm()
    {
        $setting = Setting::first();
        return view('client.auth.doimatkhau')->with("setting", $setting);
    }
    public function change_password(Request $request)
    {
        $id = Auth::guard('customer')->user()->id;
        $customer = Customer::find($id);
        if (!\Hash::check($request->password_old, $customer->password)) {
            Flash::error('Mật khẩu cũ không đúng.');
            return redirect('/update_password');
        }

        if (\Hash::check($request->password_new, $customer->password)) {
            Flash::error('Mật khẩu mới trùng với mật khẩu hiện tại.');
            return redirect('/update_password');
        }
        $correctPasswordConfirm = $request->password_new === $request->password_new_confirm;
        if ($correctPasswordConfirm) {
            $customer->password = Hash::make($request->password_new);
            $customer->save();
            Flash::success('Đổi mật khẩu thành công.');
            return redirect('/thongtin');
        } else {
            Flash::error('Mật khẩu mới không trùng khớp.');
            return redirect('/update_password');
        }
    }

    public function showFormprofile()
    {
        $setting = Setting::first();
        return view('client.auth.doithongtin')->with("setting", $setting);
    }
    public function changeProfile(Request $request)
    {
        $id = Auth::guard('customer')->user()->id;
        $customer = Customer::find($id);
        if ($customer) {
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->address = $request->diachi ?? '';
            $customer->date_birth = $request->ngaysinh ?? '';
            $customer->sex = $request->txtgioitinh ?? '';
            $customer->save();
            Flash::success('Cập nhật thông tin thành công.');
            return redirect('/thongtin');
        } else {
            Flash::error('Cập nhật thông tin không thành công.');
            return redirect('/thongtin');
        }
    }
}
