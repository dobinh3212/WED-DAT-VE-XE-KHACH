<?php

namespace App\Http\Controllers;

use App\Models\Buse;
use App\Models\Coach;
use QrCode;
use App\Models\OrderTicket;
use App\Models\RouteBus;
use App\Models\Setting;
use App\Models\TypeBuses;
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
    $order_ticket = OrderTicket::where('customer_id', Auth::guard('customer')->user()->id)->orderBy('id', 'desc')->get();
    return view('client.website.thongtinlichsu', ["setting" => $setting], ["order_ticket" => $order_ticket]);
  }
  public function detail_ticket($id)
  {
    $setting = Setting::first();
    $order_ticket = OrderTicket::where('id', $id)->first();
    $chonve = Buse::find($order_ticket->buse_id);
    $coach = Coach::find($chonve->coach_id);
    $route_bus = RouteBus::find($chonve->route_id);
    $type_buse = TypeBuses::find($coach->type_car_id);
    $qrCode = QrCode::size(100)->generate('Ma Don Hang La:' . $id);

    return view(
      'client.website.chitietve',
      [
        'order_ticket' => $order_ticket,
        'coach' => $coach,
        'chonve' => $chonve,
        'route_bus' => $route_bus,
        'type_buse' => $type_buse,
        'setting' => $setting,
        'qrCode' => $qrCode,
      ]
    );
  }
}
