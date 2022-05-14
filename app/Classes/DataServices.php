<?php

namespace App\Classes;


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
}
