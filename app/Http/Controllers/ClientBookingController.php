<?php

namespace App\Http\Controllers;

use App\Models\Buse;
use App\Models\Coach;
use App\Models\OrderTicket;
use App\Models\Province;
use App\Models\RouteBus;
use App\Models\Setting;
use App\Models\TypeBuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class ClientBookingController extends Controller
{
    public function datve()
    {
        $setting = Setting::first();
        $tinh = Province::pluck('name', 'id');
        return view('client.datve.datve')->with("setting", $setting)->with("tinh", $tinh);
    }
    public function chonchuyen(Request $request)
    {
        $setting = Setting::first();
        $chuyenxe = [];
        $chuyenxes = [];
        if ($request->noidi && $request->noiden && $request->Ngaydi) {
            $route_bus = RouteBus::where('route', $request->noidi . ' - ' . $request->noiden)->first();
            if ($route_bus != '') {
                $chuyenxe = Buse::where('route_id', $route_bus->id)->where('start_day', $request->Ngaydi)->get();
            }
        }
        if (count($chuyenxe) == 0 && $request->noidi && $request->noiden) {
            $route_bus = RouteBus::where('route', $request->noidi . ' - ' . $request->noiden)->first();
            if ($route_bus != '') {
                $chuyenxes = Buse::where('route_id', $route_bus->id)->get();
            }
        }
        return view('client.datve.chuyenxe')->with("setting", $setting)->with("chuyenxe", $chuyenxe)->with("chuyenxes", $chuyenxes);
    }
    public function tuyenxephobien($id)
    {
        $departure = RouteBus::find($id)->departure;
        $destination = RouteBus::find($id)->destination;
        $setting = Setting::first();
        return view('client.datve.datve')->with("setting", $setting)->with("departure", $departure)->with("destination", $destination);
    }
    public function chonve($id)
    {
        $setting = Setting::first();
        $chonve = Buse::find($id);
        $route_bus = RouteBus::find($chonve->route_id);
        $coach = Coach::find($chonve->coach_id);
        $type_buse = TypeBuses::find($coach->type_car_id);
        return view('client.datve.chonve')->with("setting", $setting)->with('chonve', $chonve)->with('route_bus', $route_bus)->with('type_buse', $type_buse);
    }
    public function thanhtoan(Request $request)
    {
        $setting = Setting::first();
        $sove = $request->number;
        $chonve = Buse::find($request->id);
        $chonve->update(['number_seat' => $chonve->number_seat - $request->number]); //cập nhật số vé
        $route_bus = RouteBus::find($chonve->route_id);
        $coach = Coach::find($chonve->coach_id);
        $type_buse = TypeBuses::find($coach->type_car_id);
        return view('client.datve.thanhtoan1')->with("setting", $setting)->with("sove", $sove)->with('chonve', $chonve)->with('route_bus', $route_bus)->with('type_buse', $type_buse);
    }
    public function thanhtoan2(Request $request)
    {
        $setting = Setting::first();
        return view('client.datve.thanhtoan2', ['request' => $request, 'setting' => $setting]);
    }
    public function thanhtoan3(Request $request)
    {
        // tạo order
        $input['customer_id'] =  1; // tạm thời để 1
        $input['buse_id'] = $request->buse_id;
        $input['is_active'] = 0; //chưa thanh toán
        $input['number'] = $request->sove ?? 0;
        $input['total'] = $request->total ?? 0;

        $order_ticket = OrderTicket::create($input);
        // kết thúc tạo order
        if ($request->method_pay_id == 'bank') {
            return view('client.datve.bank', [
                'order_ticket' => $order_ticket,
            ]);
        } elseif ($request->method_pay_id == 'zalopayapp') {
            $appid = env('ZLP_APP_ID'); // lấy từ cấu hình trong .env
            $key1 = env('ZLP_KEY_1');
            $key2 = env('ZLP_KEY_2');
            $endpoint = env('ZLP_CREATE_ORDER_URL');
            $redirecturl = env('ZLP_RETURN_URL');
            $embeddata = [
                "merchantinfo" => "embeddata123",
                "redirecturl" => "$redirecturl?code=" . $order_ticket['id'] . "&order_ticket=" . $order_ticket['id'],
            ];
            $items = [
                [
                    "Mã đơn hàng" => $order_ticket['id'],
                    "Đơn giá" => $order_ticket['total'],
                ]
            ];
            $order = [
                "appid" => $appid,
                "apptime" => round(microtime(true) * 1000), // miliseconds
                "apptransid" => date("ymd") . "_" . uniqid(), // mã giao dich có định dạng yyMMdd_xxxx
                "appuser" => "demo",
                "item" => json_encode($items, JSON_UNESCAPED_UNICODE),
                "embeddata" => json_encode($embeddata, JSON_UNESCAPED_UNICODE),
                "amount" =>  $order_ticket['total'],
                "code" =>  $order_ticket['id'],
                "description" => "Xe khách DVB - Thanh toán đơn hàng : " . $order_ticket['id'],
                "bankcode" => "zalopayapp",
            ];
            $data = $order["appid"] . "|" . $order["apptransid"] . "|" . $order["appuser"] . "|" . $order["amount"]
                . "|" . $order["apptime"] . "|" . $order["embeddata"] .  "|" . $order["item"];
            $order["mac"] = hash_hmac("sha256", $data, $key1);

            $context = stream_context_create([
                "http" => [
                    "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                    "method" => "POST",
                    "content" => http_build_query($order)
                ]
            ]);


            $resp = file_get_contents($endpoint, false, $context);
            $result = json_decode($resp, true);
            $url = $result['orderurl'];
            return redirect($url);
        } elseif ($request->method_pay_id == 'zalopayvisa') {
            $appid = env('ZLP_APP_ID'); // lấy từ cấu hình trong .env
            $key1 = env('ZLP_KEY_1');
            $key2 = env('ZLP_KEY_2');
            $endpoint = env('ZLP_CREATE_ORDER_URL');
            $redirecturl = env('ZLP_RETURN_URL');
            $embeddata = [
                "merchantinfo" => "embeddata123",
                "redirecturl" => "$redirecturl?code=" . $order_ticket['id'] . "&order_ticket=" . $order_ticket['id'],
                "bankgroup" => "CC",
            ];
            $items = [
                [
                    "Mã đơn hàng" => $order_ticket['id'],
                    "Đơn giá" => $order_ticket['total'],
                ]
            ];
            $order = [
                "appid" => $appid,
                "apptime" => round(microtime(true) * 1000), // miliseconds
                "apptransid" => date("ymd") . "_" . uniqid(), // mã giao dich có định dạng yyMMdd_xxxx
                "appuser" => "demo",
                "item" => json_encode($items, JSON_UNESCAPED_UNICODE),
                "embeddata" => json_encode($embeddata, JSON_UNESCAPED_UNICODE),
                "amount" =>  $order_ticket['total'],
                "description" => "Xe khách DVB - Thanh toán đơn hàng : " . $order_ticket['id'],
                "bankcode" => "",
            ];
            $data = $order["appid"] . "|" . $order["apptransid"] . "|" . $order["appuser"] . "|" . $order["amount"]
                . "|" . $order["apptime"] . "|" . $order["embeddata"] . "|" . $order["item"];
            $order["mac"] = hash_hmac("sha256", $data, $key1);

            $context = stream_context_create([
                "http" => [
                    "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                    "method" => "POST",
                    "content" => http_build_query($order)
                ]
            ]);
            $resp = file_get_contents($endpoint, false, $context);
            $result = json_decode($resp, true);
            $url = $result['orderurl'];
            foreach ($result as $key => $value) {
                echo "$key: $value<br>";
            }
            return redirect($url);
        } elseif ($request->method_pay_id == 'zalopayatm') {
            $appid = env('ZLP_APP_ID'); // lấy từ cấu hình trong .env
            $key1 = env('ZLP_KEY_1');
            $key2 = env('ZLP_KEY_2');
            $endpoint = env('ZLP_CREATE_ORDER_URL');
            $redirecturl = env('ZLP_RETURN_URL');
            $embeddata = [
                "merchantinfo" => "embeddata123",
                "redirecturl" => "$redirecturl?code=" . $order_ticket['id'],
                "bankgroup" => "ATM",
            ];
            $items = [
                [
                    "Mã đơn hàng" => $order_ticket['code'],
                    "Đơn giá" => $order_ticket['total'],
                ]
            ];
            $order = [
                "appid" => $appid,
                "apptime" => round(microtime(true) * 1000), // miliseconds
                "apptransid" => date("ymd") . "_" . uniqid(), // mã giao dich có định dạng yyMMdd_xxxx
                "appuser" => "demo",
                "item" => json_encode($items, JSON_UNESCAPED_UNICODE),
                "embeddata" => json_encode($embeddata, JSON_UNESCAPED_UNICODE),
                "amount" =>  $order_ticket['total'],
                "description" => "Vinacase - Thanh toán đơn hàng : " . $order_ticket['id'],
                "bankcode" => "",
            ];
            $data = $order["appid"] . "|" . $order["apptransid"] . "|" . $order["appuser"] . "|" . $order["amount"]
                . "|" . $order["apptime"] . "|" . $order["embeddata"] . "|" . $order["item"];
            $order["mac"] = hash_hmac("sha256", $data, $key1);

            $context = stream_context_create([
                "http" => [
                    "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                    "method" => "POST",
                    "content" => http_build_query($order)
                ]
            ]);
            $resp = file_get_contents($endpoint, false, $context);
            $result = json_decode($resp, true);
            $url = $result['orderurl'];
            foreach ($result as $key => $value) {
                echo "$key: $value<br>";
            }
            return redirect($url);
        }
    }
}
