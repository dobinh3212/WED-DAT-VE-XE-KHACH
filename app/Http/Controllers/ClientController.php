<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Province;
use App\Models\RouteBus;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
            $setting = Setting::first();
            $tinh = Province::get();
            $lo_trinhs = RouteBus::where('hot',1)->get(); //lấy ra lộ trình phổ biến
            $tinh_datve = Province::pluck('name', 'id');
            $tintuc = News::orderBy('id','desc')->limit(3)->get();
            $slide = News::where('check_slide',1)->select('image','title','id')->get();
            return view('client.website.index',["tinh" => $tinh,"tinh_datve" => $tinh_datve,"tintuc"=>$tintuc, "slide"=>$slide,"setting"=> $setting,"lo_trinhs"=> $lo_trinhs]);
    }
    public function introduce()
    {
            $setting = Setting::first();
            $gioithieu = DB::table("introduce")->orderBy('id', 'desc')->limit(1)->select("*")->get();
            return view('client.website.gioithieu',['gioithieu'=>$gioithieu,"setting"=> $setting]);
    }
    public function contact()
    {
            $setting = Setting::first();
            return view('client.lienhe.lienhe',["setting"=> $setting]);
    }
    public function return()
    {
        return redirect('/thongtin');
        // return redirect()->back();
    }
}
