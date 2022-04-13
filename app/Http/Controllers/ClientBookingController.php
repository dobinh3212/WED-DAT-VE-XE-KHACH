<?php

namespace App\Http\Controllers;

use App\Models\Buse;
use App\Models\Province;
use App\Models\RouteBus;
use App\Models\Setting;
use Illuminate\Http\Request;


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
    public function chonve()
    {
        return view('client.datve.chonve');
    }
}
