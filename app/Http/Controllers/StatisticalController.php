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
        $total_ticket = \App\Classes\DataServices::check_ticket($months);
        $total_month = \App\Classes\DataServices::check($months);
        $buse_active1 = Buse::where('start_day', '>=', Carbon::today()->format("Y-m-00"))->where('is_active', 1)->count(); //đang chờ
        $buse_active2 = Buse::where('start_day', '>=', Carbon::today()->format("Y-m-00"))->wherein('is_active', [2, 3])->count(); //đang chạy //hoàn thành == đã đi
        $buse_active3 = Buse::where('start_day', '>=', Carbon::today()->format("Y-m-00"))->where('is_active', 3)->count(); //hoàn thành
        $taixe = Buse::where('start_day', '>=', Carbon::today()->format("Y-m-00"))->where('created_at', '<=', Carbon::now())->where('driver_id', Auth::user()->id ?? '')->count();
        $chuyenxe = [];
        for ($i = 1; $i < 13; $i++) {
            if ($i < 10) {
                $chuyenxe[$i] = Buse::where('start_day', '>=',  "2022-0$i-00")->where('created_at', '<=', "2022-0$i-30")->where('driver_id', Auth::user()->id ?? '')->count();
            } else {
                $chuyenxe[$i] = Buse::where('start_day', '>=',  "2022-$i-00")->where('created_at', '<=', "2022-$i-30")->where('driver_id', Auth::user()->id ?? '')->count();
            }
        }
        $thang = Carbon::now()->format("m");
        $customer = Customer::count();
        $thang_array = \App\Classes\DataServices::thang_order_ticket();
        $new = News::count();
        $buse_active = array('buse_active1' => $buse_active1, 'buse_active2' => $buse_active2, 'buse_active3' => $buse_active3);
        $array_ticket = array('customer' => $customer, 'taixe' => $taixe, 'new' => $new, 'total_month' => $total_month, 'thang' => $thang, 'total_ticket' => $total_ticket);
        return view('admin.thongke.thongke', ["thang_array" => $thang_array, "chuyenxe" => $chuyenxe, "array_ticket" => $array_ticket, "buse_active" => $buse_active]);
    }
    public function chitietdatve()
    {
        $days = OrderTicket::where('created_at', '>=', Carbon::yesterday()->format("Y-m-dd"))->where('created_at', '<=', Carbon::now()->format("Y-M-dd"))->get();
        $days = \App\Classes\DataServices::check_ticket($days);
        $week = OrderTicket::where('created_at', '>=', Carbon::now()->subDay(Carbon::now()->dayOfWeek))->where('created_at', '<=', Carbon::now())->get();
        $week = \App\Classes\DataServices::check_ticket($week);
        $month = OrderTicket::where('created_at', '>=', Carbon::today()->format("Y-m-00"))->where('created_at', '<=', Carbon::now())->get();
        $month = \App\Classes\DataServices::check_ticket($month);
        $year = OrderTicket::where('created_at', '>=', Carbon::today()->format("Y-00-00"))->where('created_at', '<=', Carbon::now())->get();
        $year = \App\Classes\DataServices::check_ticket($year);
        $beginning = OrderTicket::count();
        $thang = Carbon::now()->format("m");
        $nam = Carbon::now()->format("Y");
        $order_ticket = \App\Classes\DataServices::order_ticket();
        $array_ticket = array('thang' => $thang, 'nam' => $nam, 'days' => $days, 'week' => $week, 'month' => $month, 'year' => $year, 'beginning' => $beginning,);
        return view('admin.thongke.chitietdatve', ["array_ticket" => $array_ticket, "order_ticket" => $order_ticket]);
    }
}
