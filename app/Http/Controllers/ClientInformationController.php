<?php

namespace App\Http\Controllers;

use App\Models\Buse;
use App\Models\Coach;
use QrCode;
use App\Models\OrderTicket;
use App\Models\RouteBus;
use App\Models\Setting;
use App\Models\TypeBuses;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Flash;

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
  public function delete_ticket($id)
  {
    $order_tickets = OrderTicket::where('id', $id)->first();
    $order_tickets->delete();
    Flash::success('Xóa vé thành công.');
    return redirect('/lichsudatve');
  }
  public function hoan_tien($id)
  {
    $order_ticket = OrderTicket::where('id', $id)->first();
    $buse = Buse::find($order_ticket->buse_id);
    $date_start = strtotime($buse->start_day . ' ' . $buse->start_time) + 720;
    $date_now = strtotime(Carbon::now()->format('d-m-Y H:i:s'));
    if ($date_start > $date_now) {
      Flash::success('Thất bại, Đã quá thời gian hoàn trả');
      return redirect('/lichsudatve');
    } else {
      $buse = Buse::find($order_ticket->buse_id);
      $buse->number_seat = $buse->number_seat + $order_ticket->number;
      $buse->save();
      $order_ticket->is_active = 3;
      $order_ticket->save();
      Flash::success('Hoàn trả vé thành công.');
      return redirect('/lichsudatve');
    }
    Flash::success('Giao dịch thất bại');
    return redirect('/lichsudatve');
  }
}
