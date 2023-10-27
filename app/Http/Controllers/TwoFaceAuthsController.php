<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwoFaceAuthsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();
        $secretCode = $googleAuthenticator->createSecret();
        $qrCodeUrl = $googleAuthenticator->getQRCodeGoogleUrl(
            auth()->user()->email,
            $secretCode,
            config("app.name")
        );

        session(["secret_code" => $secretCode]);

        return view("admin.two_face_auths.index", compact("qrCodeUrl"));
    }

    public function enable(Request $request)
    {
        $this->validate($request, [
            "code" => "required|digits:6"
        ]);
        $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();

        $secretCode = session("secret_code");

        if (!$googleAuthenticator->verifyCode($secretCode, $request->get("code"), 0)) {
            return redirect()->back()->with("error", "Invalid code");
        }
        $user = auth()->user();
        $user->secret_code = $secretCode;
        $user->save();
        session()->flash("success", true);

        return view("admin.two_face_auths.index")->with("status", "Cài đặt xác thực 2 lớp thành công !");
    }
    public function disable(Request $request)
    {
        // Update secret code cho người dùng
        $user = auth()->user();
        $user->secret_code = null;
        $user->save();
        session()->flash("success", true);

        return view("admin.two_face_auths.index")->with("status", "Tắt xác thực 2 lớp thành công !");
        // return ok;
    }
}
