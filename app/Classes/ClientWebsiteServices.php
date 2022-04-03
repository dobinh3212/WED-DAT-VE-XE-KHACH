<?php

namespace App\Classes;

use App\Models\Domains;
use App\Models\Themes;
use DB;
use App\Models\SchemaTables;
use App\Models\SchemaColumes;
use Illuminate\Support\Facades\Hash;

class ClientWebsiteServices
{
    public static function checkDomainNew($domain)
    {
        if (strtolower(substr($domain, 8, 4)) == 'demo') {
            return false;
        }
        $find_domain = Domains::where('domain', $domain)->where('status_id', 1)->first();
        if ($find_domain) {
            return false;
        } else {
            return true;
        }
    }

    public static function checkIsLimitTrialDomain()
    {
        $limit_trial_website = (int) get_setting('limit_trial_website');
        if ($limit_trial_website == 0) {
            $limit_trial_website = 1;
        }
        $count_trial_domain = Domains::where('user_id', auth()->user()->id)->where('status_id', 1)->count();
        if ($count_trial_domain >= $limit_trial_website) {
            return false;
        } else {
            return true;
        }
    }

    public static function createClientDB($theme_id, $client_db_name)
    {
        DB::statement('SET SQL_MODE=ALLOW_INVALID_DATES;');
        DB::statement("SET SESSION sql_mode='NO_AUTO_VALUE_ON_ZERO';");
        $theme = Themes::findOrFail($theme_id);
        $theme_db_name = $theme->db_name;
        \App\Classes\ClientWebsiteServices::createDB($client_db_name);
        $params['TABLE_SCHEMA'] = $theme_db_name;
        $database_table_templates = SchemaTables::filter($params)->get();
        foreach ($database_table_templates as $database_table_template) {
            $table_name = $database_table_template->TABLE_NAME;
            \App\Classes\ClientWebsiteServices::cloneTable($theme->db_name, $client_db_name, $table_name);
        }
    }

    public static function createDB($client_db_name)
    {
        $sql_create_db = 'CREATE SCHEMA ' . $client_db_name . ';';
        DB::statement($sql_create_db);
    }

    public static function cloneTable($src_db_name, $des_db_name, $table_name)
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . $des_db_name . "." . $table_name . " LIKE " . $src_db_name . "." . $table_name . ";";
        DB::statement($sql);
        $sql = "INSERT INTO " . $des_db_name . "." . $table_name . " SELECT * from " . $src_db_name . "." . $table_name . ";";
        DB::statement($sql);
    }

    public static function configData($domain)
    {
        $db = $domain->database_name;
        $domain_info = $domain->domain;
        $admin_user = $domain->user_login;
        $color_theme = $domain->theme_color;
        $admin_pass = Hash::make($domain->pass_word);
        DB::table("$db.wp_options")->where('option_name', 'siteurl')->update(['option_value' => $domain_info]);
        DB::table("$db.wp_options")->where('option_name', 'home')->update(['option_value' => $domain_info]);
        DB::table("$db.wp_options")->where('option_name', 'admin_mode')->update(['option_value' => 'basic']);
        if (isset($color_theme)) {
            DB::table("$db.wp_options")->where('option_name', 'color_primary')->update(['option_value' => '#' . $color_theme]);
        }
        DB::table("$db.wp_users")->where('user_login', 'admin')->update(['user_pass' => $admin_pass]);
        DB::table("$db.wp_users")->where('user_login', 'admin')->update(['user_url' => $domain_info]);
        DB::table("$db.wp_users")->where('user_login', 'admin')->update(['user_email' => $domain->user->email ?? 'admin@' . clearHTTP($domain_info)]);
        // $user = DB::table("$db.wp_users")->insert([
        //     'user_login' => $admin_user,
        //     'user_pass' => $admin_pass,
        //     'user_nicename' => $admin_user,
        //     'user_email' => $admin_user . '@' . clearHTTP($domain_info),
        //     'user_url' => $admin_user,
        //     'display_name' => $admin_user
        // ]);
        // DB::table("$db.wp_usermeta")->insert([
        //     'user_id' => $user->id,
        //     'meta_key' => 'wp_capabilities',
        //     'meta_value' => 'a:1:{s:13:"administrator";b:1;}'
        // ]);
        // DB::table("$db.wp_usermeta")->insert([
        //     'user_id' => $user->id,
        //     'meta_key' => 'wp_user_level',
        //     'meta_value' => '10'
        // ]);
    }
}
