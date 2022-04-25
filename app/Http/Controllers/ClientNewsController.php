<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class ClientNewsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:customer');
  }
  public function index()
  {
    dd(Auth::guard('customer')->user()->name);
    $setting = Setting::first();
    $tintuc = News::paginate(6);
    return view('client.tintuc.tintuc', ["tintuc" => $tintuc, "setting" => $setting]);
  }

  public function show($id)
  {
    $setting = Setting::first();
    $tintuc = News::where('id', $id)->select("title", "introduce", "content", "created_at")->get();
    $tintuckhac = News::where('id', '!=', $id)->orderBy('id', 'desc')->limit(3)->get();
    return view('client.tintuc.chitiettintuc', ["tintuc" => $tintuc, "tintuckhac" => $tintuckhac, "setting" => $setting]);
  }
}
