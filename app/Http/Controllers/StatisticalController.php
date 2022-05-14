<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\News;
use App\Models\OrderTicket;
use App\Models\Users;
use App\Models\Buse;
use Carbon\Carbon;
use Auth;

class StatisticalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function thongke()
    {
      
        $months = OrderTicket::where('created_at', '>=', Carbon::today()->format("Y-m-00"))->where('created_at', '<=', Carbon::now())->get();
        $total_month = \App\Classes\DataServices::check($months);
        $thang1 = OrderTicket::where('created_at', '>=',  "2022-01-00")->where('created_at', '<=', "2022-01-30")->get();
        $thang1 = \App\Classes\DataServices::check($thang1);
        $thang2 = OrderTicket::where('created_at', '>=',  "2022-02-00")->where('created_at', '<=', "2022-02-30")->get();
        $thang2 = \App\Classes\DataServices::check($thang2);
        $thang3 = OrderTicket::where('created_at', '>=',  "2022-03-00")->where('created_at', '<=', "2022-03-30")->get();
        $thang3 = \App\Classes\DataServices::check($thang3);
        $thang4 = OrderTicket::where('created_at', '>=',  "2022-04-00")->where('created_at', '<=', "2022-04-30")->get();
        $thang4 = \App\Classes\DataServices::check($thang4);
        $thang5 = OrderTicket::where('created_at', '>=',  "2022-05-00")->where('created_at', '<=', "2022-05-30")->get();
        $thang5 = \App\Classes\DataServices::check($thang5);
        $thang6 = OrderTicket::where('created_at', '>=',  "2022-06-00")->where('created_at', '<=', "2022-06-30")->get();
        $thang6 = \App\Classes\DataServices::check($thang6);
        $thang7 = OrderTicket::where('created_at', '>=',  "2022-07-00")->where('created_at', '<=', "2022-07-30")->get();
        $thang7 = \App\Classes\DataServices::check($thang7);
        $thang8 = OrderTicket::where('created_at', '>=',  "2022-08-00")->where('created_at', '<=', "2022-08-30")->get();
        $thang8 = \App\Classes\DataServices::check($thang8);
        $thang9 = OrderTicket::where('created_at', '>=',  "2022-09-00")->where('created_at', '<=', "2022-09-30")->get();
        $thang9 = \App\Classes\DataServices::check($thang9);
        $thang10 = OrderTicket::where('created_at', '>=',  "2022-10-00")->where('created_at', '<=', "2022-10-30")->get();
        $thang10 = \App\Classes\DataServices::check($thang10);
        $thang11 = OrderTicket::where('created_at', '>=',  "2022-11-00")->where('created_at', '<=', "2022-11-30")->get();
        $thang11 = \App\Classes\DataServices::check($thang11);
        $thang12 = OrderTicket::where('created_at', '>=',  "2022-12-00")->where('created_at', '<=', "2022-12-30")->get();
        $thang12 = \App\Classes\DataServices::check($thang12);
        $taixe = Buse::where('created_at', '>=', Carbon::today()->format("Y-m-00"))->where('created_at', '<=', Carbon::now())->where('driver_id',Auth::user()->id??'')->count();
        $chuyenxe=[];
        for($i=1;$i<13;$i++){
            if($i<10){
            $chuyenxe[$i] = Buse::where('created_at', '>=',  "2022-0$i-00")->where('created_at', '<=', "2022-0$i-30")->where('driver_id',Auth::user()->id??'')->count();
            }else{
                $chuyenxe[$i] = Buse::where('created_at', '>=',  "2022-$i-00")->where('created_at', '<=', "2022-$i-30")->where('driver_id',Auth::user()->id??'')->count();
            }
        }
        $month = $months->count();
        $thang = Carbon::now()->format("m");
        $nam = Carbon::now()->format("Y");
        $customer = Customer::count();
       
        $new = News::count();
        $thang_array = array('nam'=>$nam,
            'thang1' => $thang1, 'thang2' => $thang2, 'thang3' => $thang3, 'thang4' => $thang4, 'thang5' => $thang5, 'thang6' => $thang6, 'thang7' => $thang7,
            'thang8' => $thang8, 'thang9' => $thang9, 'thang10' => $thang10, 'thang11' => $thang11, 'thang12' => $thang12
        );
        $array_ticket = array('customer' => $customer,'taixe' => $taixe, 'new' => $new, 'total_month' => $total_month, 'thang' => $thang, 'month' => $month);
        return view('admin.thongke.thongke', ["thang_array" => $thang_array,"chuyenxe" => $chuyenxe,"array_ticket" => $array_ticket]);
    }
    public function chitietdatve()
    {
        $days = OrderTicket::where('created_at', '>=', Carbon::yesterday())->where('created_at', '<=', Carbon::now())->count();
        $week = OrderTicket::where('created_at', '>=', Carbon::today()->subDay(Carbon::today()->dayOfWeek))->where('created_at', '<=', Carbon::today())->count();
        $month = OrderTicket::where('created_at', '>=', Carbon::today()->format("Y-m-00"))->where('created_at', '<=', Carbon::now())->count();
        $year = OrderTicket::where('created_at', '>=', Carbon::today()->format("Y-00-00"))->where('created_at', '<=', Carbon::now())->count();
        $beginning = OrderTicket::count();
        $thang = Carbon::now()->format("m");
        $array_ticket = array('thang' => $thang, 'day' => $days, 'week' => $week, 'month' => $month, 'year' => $year, 'beginning' => $beginning,);
        return view('admin.thongke.chitietdatve', ["array_ticket" => $array_ticket]);
    }
}
