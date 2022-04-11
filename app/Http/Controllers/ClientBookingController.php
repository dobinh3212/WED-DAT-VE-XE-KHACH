<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Province;
use App\Models\RouteBus;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class ClientBookingController extends Controller
{
    public function datve()
    {      
            $setting = Setting::first();
            return view('client.datve.datve')->with("setting", $setting);
    }
    public function chonchuyen()
    {
            return view('client.datve.chuyenxe');
    }
    public function chonve()
    {
        return view('client.datve.chonve');
    }
}
