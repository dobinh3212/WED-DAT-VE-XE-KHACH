<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\OrderTicket;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class ClientInformationController extends Controller
{
  public function information()
  {
    $setting = Setting::first();
    return view('client.website.thongtinkhachhang', ["setting" => $setting]);
  }
  public function lichsudatve()
  {
    $setting = Setting::first();
    $order_ticket = OrderTicket::where('customer_id', Auth::guard('customer')->user()->id)->get();
    return view('client.website.thongtinlichsu', ["setting" => $setting], ["order_ticket" => $order_ticket]);
  }
}
