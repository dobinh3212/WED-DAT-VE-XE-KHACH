<?php

namespace App\Http\Controllers;

use App\Models\Buse;
use App\Models\Coach;
use App\Models\OrderTicket;
use App\Models\Province;
use App\Models\RouteBus;
use App\Models\Setting;
use App\Models\TypeBuses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use QrCode;

class ClientBookingController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function datve()
    {
        $date_now = strtotime(Carbon::now()->format('d-m-Y'));
        $buses = Buse::get();
        foreach ($buses as  $buse) {
            $start_day = strtotime(Carbon::createFromFormat('Y-m-d', $buse->start_day)->format('d-m-Y'));
            if ($start_day <= $date_now) {
                $buse->is_active = 3;
                $buse->save();
            }
        }

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
                $chuyenxe = Buse::where('route_id', $route_bus->id)->where('is_active', '!=', 3)->where('start_day', $request->Ngaydi)->get();
            }
        }
        if (count($chuyenxe) == 0 && $request->noidi && $request->noiden) {
            $route_bus = RouteBus::where('route', $request->noidi . ' - ' . $request->noiden)->first();
            if ($route_bus != '') {
                $chuyenxes = Buse::where('route_id', $route_bus->id)->where('is_active', '!=', 3)->get();
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
        return view('client.datve.chonve')->with("setting", $setting)->with("coach", $coach)->with('chonve', $chonve)->with('route_bus', $route_bus)->with('type_buse', $type_buse);
    }
    public function thanhtoan(Request $request)
    {
        $setting = Setting::first();
        $sove = $request->number;
        $chonve = Buse::find($request->id);
        $route_bus = RouteBus::find($chonve->route_id);
        $coach = Coach::find($chonve->coach_id);
        $type_buse = TypeBuses::find($coach->type_car_id);
        return view('client.datve.thanhtoan')->with("setting", $setting)->with("coach", $coach)->with("sove", $sove)->with('chonve', $chonve)->with('route_bus', $route_bus)->with('type_buse', $type_buse);
    }
    public function thanhtoan3(Request $request) // THANH TOÁN
    {
        // tạo order
        $input['customer_id'] =  Auth::guard('customer')->user()->id; // tạm thời để 1
        $input['buse_id'] = $request->buse_id;
        $input['is_active'] = 0; //chưa thanh toán
        $input['number'] = $request->sove ?? 0;
        $input['total'] = $request->total ?? 0;
        $input['payment'] = $request->method_pay_id;

        $order_ticket = OrderTicket::create($input);
        $setting = Setting::first();
        $chonve = Buse::find($request->buse_id);
        $coach = Coach::find($chonve->coach_id);
        $route_bus = RouteBus::find($chonve->route_id);
        $type_buse = TypeBuses::find($coach->type_car_id);
        $chonve->update(['number_seat' => $chonve->number_seat - $request->sove]); //cập nhật số vé
        $qrCode = QrCode::size(100)->generate('Ma Don Hang La:' . $order_ticket->id);
        // kết thúc tạo order
        if ($request->method_pay_id == 'bank') {
            return view('client.datve.success_bank', [
                'order_ticket' => $order_ticket,
                'coach' => $coach,
                'chonve' => $chonve,
                'route_bus' => $route_bus,
                'type_buse' => $type_buse,
                'setting' => $setting,
                'qrCode' => $qrCode,
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
        } elseif ($request->method_pay_id == 'vnp') {
            // session(['cost_id' => $request->id]);
            // session(['url_prev' => url()->previous()]);
            $vnp_TmnCode = env('VNP_TMN_CODE'); //Mã website tại VNPAY lấy từ cấu hình trong .env
            $vnp_HashSecret = env('VNP_HASH_SECRET'); //Chuỗi bí mật lấy từ cấu hình trong .env
            $vnp_Url = env('VNP_URL'); //lấy từ cấu hình trong .env
            $vnp_Returnurl = $input['VNP_RETURN_URL'] ?? env('VNP_RETURN_URL'); //lấy từ cấu hình trong .env
            $vnp_TxnRef = $order_ticket['id']; //Mã đơn hàng.
            $vnp_OrderInfo = $chonve->id; //"Thanh toán hóa đơn phí dich vụ";
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $order_ticket['total'] * 100;
            $vnp_Locale = 'vn';
            $vnp_IpAddr = request()->ip();

            $inputData = array(
                "vnp_Version" => "2.0.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" =>  $order_ticket['id'],
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;

            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $order_ticket['vnp_Url'] = $vnp_Url;
            return redirect($vnp_Url);
        }
    }
    public function return_vnpay(Request $request)
    {
        if ($request->vnp_ResponseCode == '00') {
            $code = $request->vnp_TxnRef;
            $order_ticket = OrderTicket::where('id', $code)->first();
            $buse = Buse::where('id', $request->vnp_OrderInfo)->first();
            $coach = Coach::find($buse->coach_id);
            $setting = Setting::first();
            $route_bus = RouteBus::find($buse->route_id);
            $type_buse = TypeBuses::find($coach->type_car_id);;
            $qrCode = QrCode::size(100)->generate('Ma Don Hang La:' . $order_ticket->id);
            $order_ticket->update(['is_active' => 1]); //cập nhật trạng thái là đã thanh toán
            return view('client.datve.success_vnp', [
                'order_ticket' => $order_ticket,
                'coach' => $coach,
                'buse' => $buse,
                'route_bus' => $route_bus,
                'type_buse' => $type_buse,
                'qrCode' => $qrCode,
                'setting' => $setting,
            ]);
        } else {
            $code = $request->vnp_TxnRef;
            return view('payment.failed-payment', ['code' => $code]);
        }
    }
}
