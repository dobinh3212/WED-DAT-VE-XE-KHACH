<?php

use App\Models\Domains;
use App\Models\Menu;
use App\Models\Package;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\Setings;
use App\Models\ThemeColors;
use App\Models\Themes;

function get_setting($key, $default_value = '')
{
    try {
        $setting = Setings::where('key', $key)->first();
        if (!empty($setting)) {
            return $setting->value;
        } else {
            return $default_value;
        }
    } catch (\Throwable $th) {
        return $default_value;
    }
}

function get_menu($key)
{
    try {
        $menus = Menu::where('group_id', $key)->orderBy('postiton', 'ASC')->get();
        if (!empty($menus)) {
            return $menus;
        } else {
            return [];
        }
    } catch (\Throwable $th) {
        return [];
    }
}

function get_post($category_id, $orderBy, $limit)
{
    try {
        $post = Post::where('category_id', $category_id)->where('is_active', 1)->orderBy('id', $orderBy)->limit($limit)->get();
        if (!empty($post)) {
            return $post;
        } else {
            return [];
        }
    } catch (\Throwable $th) {
        return [];
    }
}

function get_domain()
{
    try {
        $domains = Domains::where('user_id', auth()->user()->id)->orderBy('status_id', 'DESC')->where('status_id', 1)->get();
        if (!empty($domains)) {
            return $domains;
        } else {
            return [];
        }
    } catch (\Throwable $th) {
        return [];
    }
}

function get_package_homepage()
{
    try {
        $packages = Package::where('is_active', 1)->orderBy('id', 'ASC')->limit(3)->get();
        if (!empty($packages)) {
            return $packages;
        } else {
            return [];
        }
    } catch (\Throwable $th) {
        return [];
    }
}

function get_template_homepage()
{
    try {
        $Template = Themes::where('is_active', 1)->orderBy('id', 'ASC')->limit(3)->get();
        if (!empty($Template)) {
            return $Template;
        } else {
            return [];
        }
    } catch (\Throwable $th) {
        return [];
    }
}


function get_package()
{
    try {
        $package = Package::where('is_active', 1)->orderBy('id', 'ASC')->get();
        if (!empty($package)) {
            return $package;
        } else {
            return [];
        }
    } catch (\Throwable $th) {
        return [];
    }
}

function get_package_feature($feature)
{
    try {
        $package_feature = explode('|', $feature);
        if (!empty($package_feature)) {
            return $package_feature;
        } else {
            return [];
        }
    } catch (\Throwable $th) {
        return [];
    }
}

function get_name_themes($id)
{
    try {
        $name_themes = Themes::find($id);
        if (!empty($name_themes)) {
            return $name_themes->name;
        } else {
            return '';
        }
    } catch (\Throwable $th) {
        return '';
    }
}

function get_name_package($id)
{
    try {
        $name_package = Package::find($id);
        if (!empty($name_package)) {
            return $name_package->name;
        } else {
            return '';
        }
    } catch (\Throwable $th) {
        return '';
    }
}
function website_detail_page()
{
    try {
        $website_details_page = Domains::where('user_id', auth()->user()->id)->get();
        if (!empty($website_details_page)) {
            return $website_details_page;
        } else {
            return [];
        }
    } catch (\Throwable $th) {
        return [];
    }
}
function clearHTTP($domain)
{
    try {
        if (str_contains($domain, 'https://')) {
            return str_replace('https://', '', $domain);
        }
        if (str_contains($domain, 'http://')) {
            return str_replace('http://', '', $domain);
        }
    } catch (\Throwable $th) {
        return '';
    }
}
function clearlawmedia($domain)
{
    try {
        if (str_contains($domain, get_setting('register_domain'))) {
            return str_replace(get_setting('register_domain'), '', $domain);
        }
        if (str_contains($domain, get_setting('register_domain'))) {
            return str_replace(get_setting('register_domain'), '', $domain);
        }
    } catch (\Throwable $th) {
        return '';
    }
}
function count_number_user_use($type)
{
    try {
        if ($type == 'all') {
            $domain = Domains::where('status_id', 1)->count();
            return (int)$domain + (int) get_setting('start_count_number_user_use');
        } else {
            $domain = Domains::where('status_id', 1)->where('theme_id', $type)->count();
            return (int)$domain +  (int) get_setting('start_count_number_user_use') + 1;
        }
    } catch (\Throwable $th) {
        return 300;
    }
}


function get_theme_colors()
{
    try {
        $theme_colors = ThemeColors::where('is_active',1)->get();
        return $theme_colors;
    } catch (\Throwable $th) {
        return '';
    }
}

function hotline_zalo()
{
    try {
        $setting = Setings::where('key', 'hotline')->first();
        $setting_value = str_replace('.', '', $setting->value);
        return $setting_value;
    } catch (\Throwable $th) {
        return '#';
    }
}

function hotline_fb()
{
    try {
        $setting = Setings::where('key', 'messeger_url')->first();
        return $setting->value;
    } catch (\Throwable $th) {
        return '#';
    }
}
