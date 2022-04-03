<?php

namespace App\Classes;

use App\Models\Themes;
use Carbon\Carbon;
use Mail;

class TenantServices
{
    public static function createFolder($domains)
    {
        // $domains = Domains::findOrFail($id);
        $name_folder = clearHTTP($domains->domain);

        $theme_id = $domains->theme_id;

        $themes = Themes::find($theme_id);
        $folder_sourcecode = $themes->folder_sourcecode;

        if (isset($name_folder) && isset($folder_sourcecode)) {
            $path = public_path("tenants/$name_folder");
            if (!file_exists(public_path() . $path)) {
                \File::makeDirectory($path, 0777, true, true);
            }
            $source_storage = public_path("tenants/$folder_sourcecode");
            \File::copyDirectory($source_storage, $path, true);
            \File::delete($path . '/index.html');
        }
    }

    public static function del_domain($domains)
    {
        try {
            $old_name_path = 'tenants/' . clearHTTP($domains->domain);
            $del_name_path = 'tenants/_deleted_' . $domains->database_name;
            rename(trim($old_name_path), trim($del_name_path));
            $domains->update(['status_id' => 0]);
            return $domains;
        } catch (\Throwable $th) {
            return '';
        }
    }
    public static function check_expried($domains)
    {
        try {
            $created_at = $domains->created_at; //ngày bắt đầu

            if ($domains->start_free == null) { //ngày hết hạn
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->addDays(get_setting('limit_trial_time_day', 0));
            } else {
                $month = $domains->month;
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s', $domains->start_free)->addMonths($month);
            }
            $today = Carbon::now(); //Ngày hiện tại
            $check_expried = new \stdClass();
            $check_expried->end_date = $end_date;
            $check_expried->count_back = $today->diffInDays($end_date);
            return $check_expried;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public static function change_db($create_website, $new_db_name)
    {
        $domain = $create_website->domain;
        $theme_database_name = $create_website->themes->db_name;
        if (file_exists(public_path() . '/tenants/' . clearHTTP($domain) . '/wp-config.php')) {
            $content = file_get_contents(public_path() . '/tenants/' . clearHTTP($domain) . '/wp-config.php');
            $search = $theme_database_name;
            $content = str_replace($search, $new_db_name, $content);
            file_put_contents(public_path() . '/tenants/' . clearHTTP($domain) . '/wp-config.php', $content);
        }
    }

    public static function sendEmail($domain, $url)
    {
        try {
            if ($domain->id) {
                $email = $domain->user->email;
                $send = Mail::send('auth.sendEmail', [
                    'new_domain' => $domain->domain,
                    'user_name' => $domain->user_name,
                    'password' => $domain->pass_word,
                    'url_detail' => $url
                ], function ($message) use ($email, $domain) {
                    $message->to($email);
                    $message->subject('[' . get_setting('website_name') . '] Tạo website ' . $domain->domain . ' thành công - ' . time());
                });
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function createFileIndex($path)
    {
        \File::put($path . '/index.html', '<!DOCTYPE html>
                <html>
                
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link rel="stylesheet" type="text/css" media="screen" href="spiner.css">
                    <script src="main.js"></script>
                </head>
                <style>
                    body>div {
                        text-align: center;
                    }
                
                    .bar>span {
                        width: 50px;
                        height: 50px;
                        border-radius: 50%;
                        background-color: #ff8000;
                        display: inline-block;
                        animation: dot 1.5s ease-in-out infinite both;
                    }
                
                    .bar span.dot1 {
                        animation-delay: -0.3s;
                    }
                
                    .bar span.dot2 {
                        animation-delay: -0.15s;
                    }
                
                    .bar span.dot3 {
                        animation-delay: 0s;
                    }
                
                    @keyframes dot {
                
                        0%,
                        80%,
                        100% {
                            transform: scale(0);
                        }
                
                        40% {
                            transform: scale(1);
                        }
                    }
                </style>
                
                <body>
                    <div>
                        <div class="bar">
                            <span class="dot1"></span>
                            <span class="dot2"></span>
                            <span class="dot3"></span>
                            <h2 style="color: black;">Đang tạo website...</h2>
                        </div>
                    </div>
                </body>
                
                </html>');
    }
    public static function update_plugin($domain)
    {
        $source_root_plugin = get_setting('source_root_plugin');
        $path_root = trim(public_path() . '/tenants/' . $source_root_plugin);
        $source_destination = get_setting('source_destination');
        $path_destination = trim(public_path() . '/tenants/' . clearHTTP($domain->domain) . '/' . $source_destination);
        if (isset($source_root_plugin) && isset($source_destination) && file_exists($path_root) && file_exists($path_destination)) {
            \File::copyDirectory($path_root, $path_destination);
        }
    }
}
