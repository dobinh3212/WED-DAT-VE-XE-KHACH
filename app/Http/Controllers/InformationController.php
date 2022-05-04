<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
  public function information()
  {
    $setting = Setting::first();
    return view('client.website.thongtinkhachhang', ["setting" => $setting]);
  }
}
