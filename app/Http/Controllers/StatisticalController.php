<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderTicket;
use App\Models\Users;
use Carbon\Carbon;

class StatisticalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function thongke()
    {
        $months = OrderTicket::where('created_at', '>=', Carbon::today()->format("Y-m-00"))->where('created_at', '<=', Carbon::now())->get();
        $month = $months->count();
        $total = [];
        foreach ($months as $data) {
            $datas = $data->total;
            $total[] = $datas;
        }
        $total_month = number_format(array_sum($total));
        $thang = Carbon::now()->format("m");
        $customer = Customer::count();
        $array_ticket = array('customer' => $customer, 'total_month' => $total_month, 'thang' => $thang, 'month' => $month);
        return view('admin.thongke.thongke', ["array_ticket" => $array_ticket]);
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
