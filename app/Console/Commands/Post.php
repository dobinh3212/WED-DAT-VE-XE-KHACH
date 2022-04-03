<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Users;
use Illuminate\Support\Facades\Mail;
use App\Models\Domains;
use App\Models\Package;
use Carbon\Carbon;

class Post extends Command
{
    protected $signature = 'command:post';

    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        $domains =  Domains::where('status_id', 1)->get();
        foreach ($domains as $domain) {
            $check_expried = \TenantServices::check_expried($domain);
            $userEmail = $domain->user->name ?? '';
            $nameEmail = $domain->user->email ?? '';
            $packge = $domain->package->name ?? '';
            $nameDomain = $domain->domain;
            $expried = $check_expried->count_back ?? 0;
            if (isset($userEmail) && isset($packge)) {
                if ($expried == 1 || $expried == 3 || $expried == 7) {
                    Mail::raw("Gói dịch vụ  $packge  của Domain  $nameDomain sẽ hết hạn trong $expried ngày nữa, vui lòng gia hạn hoặc nâng cấp gói dịch vụ để không bị gián đoạn công việc. Xin cảm ơn !", function ($me) use ($nameEmail) {
                        $me->to($nameEmail)->subject('[THÔNG BÁO GIA HẠN DỊCH VỤ]');
                    });
                }
            }
        }
    }
}
