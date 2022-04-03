<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Province;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
            $tinh = Province::get();
            $tintuc = News::orderBy('id','desc')->limit(3)->get();
            $slide = News::where('check_slide',1)->select('image','title','id')->get();
            return view('client.website.index',["tinh" => $tinh,"tintuc"=>$tintuc, "slide"=>$slide]);
    }
    public function introduce()
    {
            $gioithieu = DB::table("introduce")->orderBy('id', 'desc')->limit(1)->select("*")->get();
            return view('client.website.gioithieu',['gioithieu'=>$gioithieu]);
    }
}
