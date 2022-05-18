<?php

namespace App\Classes;
use App\Models\OrderTicket;
use Carbon\Carbon;
use App\Models\Buse;
class DataServices
{
    public static function check($months)
    {
        $total = [];
        foreach ($months as $data) {
            $datas = $data->total;
            $total[] = $datas;
        }
        return (array_sum($total));
    }
    public static function check_ticket($months)
    {
        $total_ticket = [];
        foreach ($months as $data) {
            $datas = $data->number;
            $total_ticket[] = $datas;
        }
        return (array_sum($total_ticket));
    }
    public static function thang_order_ticket($months)
    {
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
        $buses = Buse::where('created_at', '>=', Carbon::today()->format("Y-m-00"))->count();
        $nam = Carbon::now()->format("Y"); 
        return $thang_array = array('nam'=>$nam,'buses'=>$buses,
        'thang1' => $thang1, 'thang2' => $thang2, 'thang3' => $thang3, 'thang4' => $thang4, 'thang5' => $thang5, 'thang6' => $thang6, 'thang7' => $thang7,
        'thang8' => $thang8, 'thang9' => $thang9, 'thang10' => $thang10, 'thang11' => $thang11, 'thang12' => $thang12
    );
    }
}
