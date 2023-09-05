<?php

namespace App\Models;

use App\Models\Mail\CommonEmailTemplate;
use App\Models\Mail\OrderMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Jenssegers\Date\Date;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use App\Models\Customer;
use Twilio\Rest\Client;

class Utility extends Model
{
    public function createSlug($table, $title, $id = 0)
    {
        // Normalize the title
        $slug = Str::slug($title, '-');
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($table, $slug, $id);
        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 100; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($table, $slug, $id = 0)
    {
        return DB::table($table)->select()->where('slug', 'like', $slug . '%')->where('id', '<>', $id)->get();
    }


    public static function getDateFormated($date, $time = false)
    {
        if (!empty($date) && $date != '0000-00-00') {
            if ($time == true) {
                return date("d M Y H:i A", strtotime($date));
            } else {
                return date("d M Y", strtotime($date));
            }
        } else {
            return '';
        }
    }
    public static function settings($user_id = null)
    {
        $data = DB::table('settings');
        if (empty($user_id)) {

            if (\Auth::check()) {
                if (\Auth::user()->type == 'super admin') {
                    $data->where('created_by', '=', Auth::user()->creatorId())->orWhere('created_by', '=', 1);
                    $data = $data->get();
                } else {
                    $data = $data->where('created_by', '=', \Auth::user()->creatorId())->where('store_id', \Auth::user()->current_store)->get();
                }
            } else {
                $data->where('created_by', '=', 1);
                $data = $data->get();
            }
        } else {
            $data->where('created_by', '=', $user_id);
            $data = $data->get();
        }

        $settings = [
            "site_currency" => "USD",
            "site_currency_symbol" => "$",
            "currency_symbol_position" => "pre",
            "logo" => "logo.png",
            "invoice_logo" => "invoice-logo.png",
            "site_date_format" => "M j, Y",
            "site_time_format" => "g:i A",
            "company_name" => "",
            "company_address" => "",
            "company_city" => "",
            "company_state" => "",
            "company_zipcode" => "",
            "company_country" => "",
            "company_telephone" => "",
            "company_email" => "",
            "company_email_from_name" => "",
            "invoice_prefix" => "#INV",
            "invoice_color" => "ffffff",
            "quote_template" => "template1",
            "quote_color" => "ffffff",
            "salesorder_template" => "template1",
            "salesorder_color" => "ffffff",
            "proposal_prefix" => "#PROP",
            "proposal_color" => "fffff",
            "bill_prefix" => "#BILL",
            "bill_color" => "fffff",
            "quote_prefix" => "#QUO",
            "salesorder_prefix" => "#SOP",
            "vender_prefix" => "#VEND",
            "footer_title" => "",
            "footer_notes" => "",
            "invoice_template" => "template1",
            "bill_template" => "template1",
            "proposal_template" => "template1",
            "enable_stripe" => "",
            "enable_paypal" => "",
            "paypal_mode" => "",
            "paypal_client_id" => "",
            "paypal_secret_key" => "",
            "stripe_key" => "",
            "stripe_secret" => "",
            "bank_number" => "",
            "decimal_number" => "2",
            "tax_type" => "VAT",
            "shipping_display" => "on",
            "footer_link_1" => "Support",
            "footer_value_1" => "#",
            "footer_link_2" => "Terms",
            "footer_value_2" => "#",
            "footer_link_3" => "Privacy",
            "footer_value_3" => "#",
            "company_logo" => "logo.png",
            "company_favicon" => "favicon.png",
            "title_text" => "",
            "footer_text" => "",
            "default_language" => "en",
            "owner_default_language" => "en",
            "enable_language" => "off",
            "display_landing_page" => "on",
            "currency_symbol" => "",
            "currency" => "",
            "cookie_text" => "",
            "signup_button" => "on",
            "verification_btn" => "off",
            "color" => "theme-3",
            "cust_theme_bg" => "on",
            "cust_darklayout" => "off",
            "dark_logo" => "logo-dark.png",
            "light_logo" => "logo-light.png",
            "company_logo" => "",
            "company_dark_logo" => "logo-dark.png",
            "company_light_logo" => "logo-light.png",
            "SITE_RTL" => "off",
            "is_checkout_login_required" => "on",
            "storage_setting" => "local",
            "local_storage_validation" => "",
            "local_storage_max_upload_size" => "",
            "s3_key" => "",
            "s3_secret" => "",
            "s3_region" => "",
            "s3_bucket" => "",
            "s3_url"    => "",
            "s3_endpoint" => "",
            "s3_max_upload_size" => "",
            "s3_storage_validation" => "",
            "wasabi_key" => "",
            "wasabi_secret" => "",
            "wasabi_region" => "",
            "wasabi_bucket" => "",
            "wasabi_url" => "",
            "wasabi_root" => "",
            "wasabi_max_upload_size" => "",
            "wasabi_storage_validation" => "",
            'enable_cookie' => 'on',
            'enable_chatgpt' => '',
            "chatgpt_key" => '',
            'necessary_cookies' => 'on',
            'cookie_logging' => 'off',
            'cookie_title' => 'We use cookies!',
            'cookie_description' => 'Hi, this website uses essential cookies to ensure its proper operation and tracking cookies to understand how you interact with it',
            'strictly_cookie_title' => 'Strictly necessary cookies',
            'strictly_cookie_description' => 'These cookies are essential for the proper functioning of my website. Without these cookies, the website would not work properly',
            'more_information_description' => 'For any queries in relation to our policy on cookies and your choices, please contact us',
            'contactus_url' => '#',
            "benefit_secret_key" =>"",
            "publishable_api_key" =>"",


            "topbar_status" => '',
            "menubar_status" => '',
            "home_status" => '',
            "feature_status" => '',
            "discover_status" => '',
            "screenshots_status" => '',
            "plan_status" => '',
            "faq_status" => '',
            "testimonials_status" => '',
            "site_logo" => '',
            "site_logo_light" => '',
            "site_logo_dark" => '',
            "site_description" => '',
            "menubar_page" => '',
            "joinus_status" => '',
        ];

        foreach ($data as $row) {
            $settings[$row->name] = $row->value;
        }
        return $settings;
    }

    public static function AdminSettings()
    {
        $user = User::where('type', 'super admin')->first();
        return self::settings($user->id);
    }

    // public static function getStorageSetting()
    // {

    // }


    public static function getStorageSetting()
    {

        $data = DB::table('settings');
        $data = $data->where('created_by', '=', 1);
        $data     = $data->get();
        $settings = [
            "storage_setting" => "local",
            "local_storage_validation" => "jpg,jpeg,png",
            "local_storage_max_upload_size" => "",
            "s3_key" => "",
            "s3_secret" => "",
            "s3_region" => "",
            "s3_bucket" => "",
            "s3_url"    => "",
            "s3_endpoint" => "",
            "s3_max_upload_size" => "",
            "s3_storage_validation" => "",
            "wasabi_key" => "",
            "wasabi_secret" => "",
            "wasabi_region" => "",
            "wasabi_bucket" => "",
            "wasabi_url" => "",
            "wasabi_root" => "",
            "wasabi_max_upload_size" => "",
            "wasabi_storage_validation" => "",
        ];

        foreach ($data as $row) {
            $settings[$row->name] = $row->value;
        }

        return $settings;
    }


    public static function languages()
    {
        $languages=Utility::langList();
        if(\Schema::hasTable('languages')){

            $settings = Utility::langSetting();
            if(!empty($settings['disable_lang'])){
                $disabledlang =explode(',', $settings['disable_lang']);
                $languages = Languages::whereNotIn('code',$disabledlang)->pluck('fullname','code');
            }
            else{
                $languages = Languages::pluck('fullname','code');
            }
        }
        return $languages;
    }

    public static function languagecreate(){
        $languages=Utility::langList();
        foreach($languages as $key => $lang)
        {
            $languageExist = Languages::where('code',$key)->first();
            if(empty($languageExist))
            {
                $language = new Languages();
                $language->code = $key;
                $language->fullname = $lang;
                $language->save();
            }
        }
    }

    public static function langList(){
        $languages = [
            "ar" => "Arabic",
            "zh" => "Chinese",
            "da" => "Danish",
            "de" => "German",
            "en" => "English",
            "es" => "Spanish",
            "fr" => "French",
            "he" => "Hebrew",
            "it" => "Italian",
            "ja" => "Japanese",
            "nl" => "Dutch",
            "pl" => "Polish",
            "pt" => "Portuguese",
            "ru" => "Russian",
            "tr" => "Turkish",
            "pt-br" => "Portuguese(Brazil)",
        ];
        return $languages;
    }

    public static function langSetting()
    {
        $data = DB::table('settings');
        $data = $data->where('created_by', '=', 1)->get();
        if (count($data) == 0) {
            $data = DB::table('settings')->where('created_by', '=', 1)->get();
        }
        $settings = [];
        foreach ($data as $row) {
            $settings[$row->name] = $row->value;
        }
        return $settings;
    }

    public function countCompany()
    {
        return User::where('type', '=', 'Owner')->where('created_by', '=', $this->creatorId())->count();
    }

    public static function getValByName($key)
    {
        $setting = Utility::settings();
        // dd($setting);
        if (!isset($setting[$key]) || empty($setting[$key])) {
            $setting[$key] = '';
        }

        return $setting[$key];
    }

    public static function getAdminPaymentSetting()
    {
        $data     = DB::table('admin_payment_settings');
        $settings = [];
        if (\Auth::check()) {
            $user_id = 1;
            $data    = $data->where('created_by', '=', $user_id);
        }
        $data = $data->get();
        foreach ($data as $row) {
            $settings[$row->name] = $row->value;
        }

        return $settings;
    }

    public static function setEnvironmentValue(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str     = file_get_contents($envFile);
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $keyPosition       = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine           = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}='{$envValue}'\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}='{$envValue}'", $str);
                }
            }
        }
        $str = substr($str, 0, -1);
        $str .= "\n";
        if (!file_put_contents($envFile, $str)) {
            return false;
        }

        return true;
    }

    public static function templateData()
    {
        $arr              = [];
        $arr['colors']    = [
            '003580',
            '666666',
            '6676ef',
            'f50102',
            'f9b034',
            'fbdd03',
            'c1d82f',
            '37a4e4',
            '8a7966',
            '6a737b',
            '050f2c',
            '0e3666',
            '3baeff',
            '3368e6',
            'b84592',
            'f64f81',
            'f66c5f',
            'fac168',
            '46de98',
            '40c7d0',
            'be0028',
            '2f9f45',
            '371676',
            '52325d',
            '511378',
            '0f3866',
            '48c0b6',
            '297cc0',
            'ffffff',
            '000',
        ];
        $arr['templates'] = [
            "template1" => "New York",
            "template2" => "Toronto",
            "template3" => "Rio",
            "template4" => "London",
            "template5" => "Istanbul",
            "template6" => "Mumbai",
            "template7" => "Hong Kong",
            "template8" => "Tokyo",
            "template9" => "Sydney",
            "template10" => "Paris",
        ];

        return $arr;
    }

    public static function themeOne()
    {
        $arr = [];

        $arr = [

            'theme7' => [
                'theme7-v1' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme7/Home.png')),
                    'color' => '0CAF60',
                ],
                'theme7-v2' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme7/Home-1.png')),
                    'color' => '3498DB',
                ],
                'theme7-v3' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme7/Home-2.png')),
                    'color' => '9B59B6',
                ],
                'theme7-v4' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme7/Home-3.png')),
                    'color' => 'E67E22',
                ],
                'theme7-v5' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme7/Home-4.png')),
                    'color' => '34495E',

                ],
            ],


            'theme1' => [
                'theme1-v1' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home.png')),
                    'color' => '3bbc9c',
                ],
                'theme1-v2' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-1.png')),
                    'color' => '3fcc71',
                ],
                'theme1-v3' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-2.png')),
                    'color' => '3498db',
                ],
                'theme1-v4' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-3.png')),
                    'color' => '9b59b6',
                ],
                'theme1-v5' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme1/Home-4.png')),
                    'color' => '34495e',
                ],
            ],
            'theme2' => [
                'theme2-v1' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme2/Home.png')),
                    'color' => '3bbc9c',
                ],
                'theme2-v2' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme2/Home-1.png')),
                    'color' => '3fcc71',
                ],
                'theme2-v3' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme2/Home-2.png')),
                    'color' => '3498db',
                ],
                'theme2-v4' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme2/Home-3.png')),
                    'color' => '9b59b6',
                ],
                'theme2-v5' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme2/Home-4.png')),
                    'color' => '34495e',
                ],
            ],
            'theme3' => [
                'theme3-v1' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme3/Home.png')),
                    'color' => 'f1c40f',
                ],
                'theme3-v2' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme3/Home-1.png')),
                    'color' => 'e67e22',
                ],
                'theme3-v3' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme3/Home-2.png')),
                    'color' => 'e74c3c',
                ],
                'theme3-v4' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme3/Home-3.png')),
                    'color' => '95a5a6',
                ],
                'theme3-v5' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme3/Home-4.png')),
                    'color' => '2c3e50',
                ],
            ],
            'theme4' => [
                'theme4-v1' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme4/Home.png')),
                    'color' => 'f39c11',
                ],
                'theme4-v2' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme4/Home-1.png')),
                    'color' => '3498db',
                ],
                'theme4-v3' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme4/Home-2.png')),
                    'color' => '9b59b6',
                ],
                'theme4-v4' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme4/Home-3.png')),
                    'color' => '3bbc9c',
                ],
                'theme4-v5' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme4/Home-4.png')),
                    'color' => '34495e',
                ],
            ],
            'theme5' => [
                'theme5-v1' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme5/Home.png')),
                    'color' => 'ee786c',
                ],
                'theme5-v2' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme5/Home-1.png')),
                    'color' => '3fcc71',
                ],
                'theme5-v3' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme5/Home-2.png')),
                    'color' => 'f1c40f',
                ],
                'theme5-v4' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme5/Home-3.png')),
                    'color' => '2980b9',
                ],
                'theme5-v5' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme5/Home-4.png')),
                    'color' => '95a5a6',
                ],
            ],
            'theme6' => [
                'theme6-v1' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme6/Home.png')),
                    'color' => '8693ae',
                ],
                'theme6-v2' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme6/Home-1.png')),
                    'color' => '3498db',
                ],
                'theme6-v3' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme6/Home-2.png')),
                    'color' => 'e67e22',
                ],
                'theme6-v4' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme6/Home-3.png')),
                    'color' => '3fcc71',
                ],
                'theme6-v5' => [
                    'img_path' => asset(Storage::url('uploads/store_theme/theme6/Home-4.png')),
                    'color' => 'f1c40f',
                ],
            ],

        ];

        return $arr;
    }

    public static function priceFormat($price)
    {
        $settings = Utility::settings();
        if (\Auth::check() && \Auth::User()->type == 'Owner') {
            $user     = Auth::user()->current_store;
            $settings = Store::where('id', $user)->first();

            if ($settings['currency_symbol_position'] == "pre" && $settings['currency_symbol_space'] == "with") {
                return $settings['currency'] . ' ' . number_format($price, isset($settings->decimal_number) ? $settings->decimal_number : 2);
            } elseif ($settings['currency_symbol_position'] == "pre" && $settings['currency_symbol_space'] == "without") {
                return $settings['currency'] . number_format($price, isset($settings->decimal_number) ? $settings->decimal_number : 2);
            } elseif ($settings['currency_symbol_position'] == "post" && $settings['currency_symbol_space'] == "with") {
                return number_format($price, isset($settings->decimal_number) ? $settings->decimal_number : 2) . ' ' . $settings['currency'];
            } elseif ($settings['currency_symbol_position'] == "post" && $settings['currency_symbol_space'] == "without") {
                return number_format($price, isset($settings->decimal_number) ? $settings->decimal_number : 2) . $settings['currency'];
            }
        } else {
            $slug = session()->get('slug');
            if (!empty($slug)) {
                $store = Store::where('slug', $slug)->first();

                if ($store['currency_symbol_position'] == "pre" && $store['currency_symbol_space'] == "with") {
                    return $store['currency'] . ' ' . number_format($price, isset($store->decimal_number) ? $store->decimal_number : 2);
                } elseif ($store['currency_symbol_position'] == "pre" && $store['currency_symbol_space'] == "without") {
                    return $store['currency'] . number_format($price, isset($store->decimal_number) ? $store->decimal_number : 2);
                } elseif ($store['currency_symbol_position'] == "post" && $store['currency_symbol_space'] == "with") {
                    return number_format($price, isset($store->decimal_number) ? $store->decimal_number : 2) . ' ' . $store['currency'];
                } elseif ($store['currency_symbol_position'] == "post" && $store['currency_symbol_space'] == "without") {
                    return number_format($price, isset($store->decimal_number) ? $store->decimal_number : 2) . $store['currency'];
                }
            }

            //return (($settings['currency_symbol_position'] == "pre") ? $settings['currency_symbol'] : '') . number_format($price, 2) . (($settings['currency_symbol_position'] == "post") ? $settings['currency_symbol'] : '');
            return (($settings['currency_symbol_position'] == "pre") ? $settings['site_currency_symbol'] : '') . number_format($price, Utility::getValByName('decimal_number')) . (($settings['currency_symbol_position'] == "post") ? $settings['site_currency_symbol'] : '');
        }
    }

    public static function currencySymbol($settings)
    {
        return $settings['site_currency_symbol'];
    }

    public static function timeFormat($settings, $time)
    {
        return date($settings['site_date_format'], strtotime($time));
    }

    public static function dateFormat($date)
    {
        $settings = Utility::settings();

        return date($settings['site_date_format'], strtotime($date));
    }

    public static function proposalNumberFormat($settings, $number)
    {
        return $settings["proposal_prefix"] . sprintf("%05d", $number);
    }

    public static function billNumberFormat($settings, $number)
    {
        return $settings["bill_prefix"] . sprintf("%05d", $number);
    }

    public static function tax($taxes)
    {
        $taxArr = explode(',', $taxes);
        $taxes  = [];
        foreach ($taxArr as $tax) {
            $taxes[] = ProductTax::find($tax);
        }

        return $taxes;
    }

    public static function taxRate($taxRate, $price, $quantity)
    {

        return ($taxRate / 100) * ($price * $quantity);
    }

    public static function totalTaxRate($taxes)
    {

        $taxArr  = explode(',', $taxes);
        $taxRate = 0;

        foreach ($taxArr as $tax) {

            $tax     = ProductTax::find($tax);
            $taxRate += !empty($tax->rate) ? $tax->rate : 0;
        }

        return $taxRate;
    }

    public static function userBalance($users, $id, $amount, $type)
    {
        if ($users == 'customer') {
            $user = Customer::find($id);
        } else {
            $user = Vender::find($id);
        }

        if (!empty($user)) {
            if ($type == 'credit') {
                $oldBalance    = $user->balance;
                $user->balance = $oldBalance + $amount;
                $user->save();
            } elseif ($type == 'debit') {
                $oldBalance    = $user->balance;
                $user->balance = $oldBalance - $amount;
                $user->save();
            }
        }
    }

    public static function bankAccountBalance($id, $amount, $type)
    {
        $bankAccount = BankAccount::find($id);
        if ($bankAccount) {
            if ($type == 'credit') {
                $oldBalance                   = $bankAccount->opening_balance;
                $bankAccount->opening_balance = $oldBalance + $amount;
                $bankAccount->save();
            } elseif ($type == 'debit') {
                $oldBalance                   = $bankAccount->opening_balance;
                $bankAccount->opening_balance = $oldBalance - $amount;
                $bankAccount->save();
            }
        }
    }

    // get font-color code accourding to bg-color
    public static function hex2rgb($hex)
    {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array(
            $r,
            $g,
            $b,
        );

        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }

    public static function getFontColor($color_code)
    {
        $rgb = self::hex2rgb($color_code);
        $R   = $G = $B = $C = $L = $color = '';

        $R = (floor($rgb[0]));
        $G = (floor($rgb[1]));
        $B = (floor($rgb[2]));

        $C = [
            $R / 255,
            $G / 255,
            $B / 255,
        ];

        for ($i = 0; $i < count($C); ++$i) {
            if ($C[$i] <= 0.03928) {
                $C[$i] = $C[$i] / 12.92;
            } else {
                $C[$i] = pow(($C[$i] + 0.055) / 1.055, 2.4);
            }
        }

        $L = 0.2126 * $C[0] + 0.7152 * $C[1] + 0.0722 * $C[2];

        if ($L > 0.179) {
            $color = 'black';
        } else {
            $color = 'white';
        }

        return $color;
    }

    public static function delete_directory($dir)
    {
        if (!file_exists($dir)) {
            return true;
        }
        if (!is_dir($dir)) {
            return unlink($dir);
        }
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (!self::delete_directory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }

        return rmdir($dir);
    }

    public static function getSuperAdminValByName($key)
    {
        $data = DB::table('settings');
        $data = $data->where('name', '=', $key);
        $data = $data->first();
        if (!empty($data)) {
            $record = $data->value;
        } else {
            $record = '';
        }

        return $record;
    }

    // used for replace email variable (parameter 'template_name','id(get particular record by id for data)')
    public static function replaceVariable($content, $obj)
    {
        $arrVariable = [
            '{store_name}',
            '{order_no}',
            '{customer_name}',
            '{phone}',
            '{billing_address}',
            '{shipping_address}',
            '{special_instruct}',
            '{item_variable}',
            '{qty_total}',
            '{sub_total}',
            '{discount_amount}',
            '{shipping_amount}',
            '{total_tax}',
            '{final_total}',
            '{sku}',
            '{quantity}',
            '{product_name}',
            '{variant_name}',
            '{item_tax}',
            '{item_total}',
        ];
        $arrValue    = [
            'store_name' => '',
            'order_no' => '',
            'customer_name' => '',
            'phone' => '',
            'billing_address' => '',
            'shipping_address' => '',
            'special_instruct' => '',
            'item_variable' => '',
            'qty_total' => '',
            'sub_total' => '',
            'discount_amount' => '',
            'shipping_amount' => '',
            'total_tax' => '',
            'final_total' => '',
            'sku' => '',
            'quantity' => '',
            'product_name' => '',
            'variant_name' => '',
            'item_tax' => '',
            'item_total' => '',
        ];

        foreach ($obj as $key => $val) {
            $arrValue[$key] = $val;
        }

        $arrValue['app_name'] = env('APP_NAME');
        $arrValue['app_url']  = '<a href="' . env('APP_URL') . '" target="_blank">' . env('APP_URL') . '</a>';

        return str_replace($arrVariable, array_values($arrValue), $content);
    }

    // Email Template Modules Function START

    public static function userDefaultData()
    {
        // Make Entry In User_Email_Template
        $allEmail = EmailTemplate::all();
        foreach ($allEmail as $email) {
            UserEmailTemplate::create(
                [
                    'template_id' => $email->id,
                    'user_id' => 1,
                    'is_active' => 1,
                ]
            );
        }
    }

    // Common Function That used to send mail with check all cases
    public static function sendEmailTemplate($emailTemplate, $mailTo, $obj, $store, $order)
    {
        // dd($emailTemplate, $mailTo, $obj, $store, $order);
        // find template is exist or not in our record
        $template = EmailTemplate::where('name', 'LIKE', $emailTemplate)->first();

        if (isset($template) && !empty($template)) {

            // check template is active or not by company
            $is_active = UserEmailTemplate::where('template_id', '=', $template->id)->first();

            if ($is_active->is_active == 1) {

                // get email content language base
                $content = EmailTemplateLang::where('parent_id', '=', $template->id)->where('lang', 'LIKE', $store->lang)->first();

                $content->from = $template->from;
                if (!empty($content->content)) {
                    $content->content = self::replaceVariables($content->content, $obj, $store, $order);

                    // send email
                    try {

                        config(
                            [
                                'mail.driver' => $store->mail_driver,
                                'mail.host' => $store->mail_host,
                                'mail.port' => $store->mail_port,
                                'mail.encryption' => $store->mail_encryption,
                                'mail.username' => $store->mail_username,
                                'mail.password' => $store->mail_password,
                                'mail.from.address' => $store->mail_from_address,
                                'mail.from.name' => $store->mail_from_name,
                            ]
                        );
                        // dd($store->mail_driver,
                        // $store->mail_host,
                        // $store->mail_port,
                        // $store->mail_encryption,
                        // $store->mail_username,
                        // $store->mail_password,
                        // $store->mail_from_address,
                        // $store->mail_from_name);

                        // if ($mailTo == $store->email) {
                        if ($mailTo == $store->email) {
                            Mail::to([$store->email])->send(new CommonEmailTemplate($content, $store));
                        } else {

                            Mail::to([$mailTo])->send(new CommonEmailTemplate($content, $store));
                        }
                    } catch (\Exception $e) {
                        $error = __('E-Mail has been not sent due to SMTP configuration');
                    }

                    if (isset($error)) {
                        $arReturn = [
                            'is_success' => false,
                            'error' => $error,
                        ];
                    } else {
                        $arReturn = [
                            'is_success' => true,
                            'error' => false,
                        ];
                    }
                } else {
                    $arReturn = [
                        'is_success' => false,
                        'error' => __('Mail not send, email is empty'),
                    ];
                }

                return $arReturn;
            } else {
                return [
                    'is_success' => true,
                    'error' => false,
                ];
            }
        } else {
            return [
                'is_success' => false,
                'error' => __('Mail not send, email not found'),
            ];
        }
    }

    // used for replace email variable (parameter 'template_name','id(get particular record by id for data)')
    public static function replaceVariables($content, $obj, $store, $order)
    {
        $arrVariable = [
            '{app_name}',
            '{order_name}',
            '{order_status}',
            '{app_url}',
            '{order_url}',
            '{owner_name}',
            '{order_id}',
            '{order_date}',
        ];
        $arrValue    = [
            'app_name' => '-',
            'order_name' => '-',
            'order_status' => '-',
            'app_url' => '-',
            'order_url' => '-',
            'owner_name' => '-',
            'order_id' => '-',
            'order_date' => '-',
        ];
        foreach ($obj as $key => $val) {
            $arrValue[$key] = $val;
        }

        $arrValue['app_name']  = $store->name;
        $arrValue['app_url']   = '<a href="' . env('APP_URL') . '" target="_blank">' . env('APP_URL') . '</a>';
        $arrValue['order_url'] = '<a href="' . env('APP_URL') . '/' . $store->slug . '/order/' . $order . '" target="_blank">' . env('APP_URL') . '/' . $store->slug . '/order/' . $order . '</a>';

        $ownername = User::where('email', $store->email)->first();
        $id    = Crypt::decrypt($order);
        $order = Order::where('id', $id)->first();
        $arrValue['owner_name']  = $ownername->name;

        $arrValue['order_id'] = isset($order->order_id) ? $order->order_id : 0;
        $arrValue['order_date'] = isset($order->order_id) ? self::dateFormat($order->created_at) : 0;

        return str_replace($arrVariable, array_values($arrValue), $content);
    }

    // Make Entry in email_tempalte_lang table when create new language
    public static function makeEmailLang($lang)
    {
        $template = EmailTemplate::all();
        foreach ($template as $t) {
            $default_lang                 = EmailTemplateLang::where('parent_id', '=', $t->id)->where('lang', 'LIKE', 'en')->first();

            $emailTemplateLang            = new EmailTemplateLang();
            $emailTemplateLang->parent_id = $t->id;
            $emailTemplateLang->lang      = $lang;
            $emailTemplateLang->subject   = $default_lang->subject;
            $emailTemplateLang->content   = $default_lang->content;
            $emailTemplateLang->save();
        }
    }

    // For Email template Module
    public static function defaultEmail()
    {
        // Email Template
        $emailTemplate = [
            'Order Created',
            'Status Change',
            "Order Created For Owner",
        ];

        foreach ($emailTemplate as $eTemp) {
            EmailTemplate::create(
                [
                    'name' => $eTemp,
                    'from' => env('APP_NAME'),
                    'created_by' => 1,
                ]
            );
        }

        $defaultTemplate = [
            'Order Created' => [
                'subject' => 'Order Complete',
                'lang' => [
                    'ar' => '<p>مرحبا ،</p><p>مرحبا بك في {app_name}.</p><p>مرحبا ، {order_name} ، شكرا للتسوق</p><p>قمنا باستلام طلب الشراء الخاص بك ، سيتم الاتصال بك قريبا !</p><p>شكرا ،</p><p>{app_name}</p><p>{order_url}</p>',
                    'da' => '<p>Hej, &nbsp;</p><p>Velkommen til {app_name}.</p><p>Hej, {order_name}, tak for at Shopping</p><p>Vi har modtaget din købsanmodning.</p><p>Tak,</p><p>{app_navn}</p><p>{order_url}</p>',
                    'de' => '<p>Hello, &nbsp;</p><p>Willkommen bei {app_name}.</p><p>Hi, {order_name}, Vielen Dank für Shopping</p><p>Wir haben Ihre Kaufanforderung erhalten, wir werden in Kürze in Kontakt sein!</p><p>Danke,</p><p>{app_name}</p><p>{order_url}</p>',
                    'en' => '<p>Hello,&nbsp;</p><p>Welcome to {app_name}.</p><p>Hi, {order_name}, Thank you for Shopping</p><p>We received your purchase request, we\'ll be in touch shortly!</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'es' => '<p>Hola, &nbsp;</p><p>Bienvenido a {app_name}.</p><p>Hi, {order_name}, Thank you for Shopping</p><p>Recibimos su solicitud de compra, ¡estaremos en contacto en breve!</p><p>Gracias,</p><p>{app_name}</p><p>{order_url}</p>',
                    'fr' => '<p>Bonjour, &nbsp;</p><p>Bienvenue dans {app_name}.</p><p>Hi, {order_name}, Thank you for Shopping</p><p>We reçus your purchase request, we \'ll be in touch incess!</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'it' => '<p>Ciao, &nbsp;</p><p>Benvenuti in {app_name}.</p><p>Ciao, {order_name}, Grazie per Shopping</p><p>Abbiamo ricevuto la tua richiesta di acquisto, noi \ saremo in contatto a breve!</p><p>Grazie,</p><p>{app_name}</p><p>{order_url}</p>',
                    'ja' => '<p>こんにちは &nbsp;</p><p>{app_name}へようこそ。</p></p><p><p>こんにちは、 {order_name}、お客様の購買要求書をお受け取りいただき、すぐにご連絡いたします。</p><p>ありがとうございます。</p><p>{app_name}</p><p>{order_url}</p>',
                    'nl' => '<p>Hallo, &nbsp;</p><p>Welkom bij {app_name}.</p><p>Hallo, {order_name}, Dank u voor Winkelen</p><p>We hebben uw aankoopaanvraag ontvangen, we zijn binnenkort in contact!</p><p>Bedankt,</p><p>{ app_name }</p><p>{order_url}</p>',
                    'pl' => '<p>Hello, &nbsp;</p><p>Witamy w aplikacji {app_name}.</p><p>Hi, {order_name}, Dziękujemy za zakupy</p><p>Otrzymamy Twój wniosek o zakup, wkrótce będziemy w kontakcie!</p><p>Dzięki,</p><p>{app_name}</p><p>{order_url}</p>',
                    'ru' => '<p>Здравствуйте, &nbsp;</p><p>Вас приветствует {app_name}.</p><p>Hi, {order_name}, Спасибо за Шоппинг</p><p>Мы получили ваш запрос на покупку, мы \ скоро свяжемся!</p><p>Спасибо,</p><p>{app_name}</p><p>{order_url}</p>',
                    'pt' => '<p>Olá,&nbsp;</p><p><span style="font-size: 1rem;">Bem-vindo a {app_name}.</span></p><p><span style="font-size: 1rem;">Oi, {order_name}, Obrigado por Shopping</span></p><p><span style="font-size: 1rem;">Recebemos o seu pedido de compra, nós estaremos em contato em breve!</span><br></p><p><span style="font-size: 1rem;">Obrigado,</span></p><p><span style="font-size: 1rem;">{app_name}</span></p><p><span style="font-size: 1rem;">{order_url}</span><br></p>',
                    'zh' => '<p>Hello，</p><p>歡迎使用 {app_name}.</p><p>Hi， {order_name}，感謝購物</p><p>我們收到您的購買要求，我們收到您的購買要求，我們很快就會聯絡！</p><p>謝謝，</p><p>{app_name}</p><p>{order_url}</p>',
                    'pt-br' => "<p>Olá,&nbsp;</p><p>Bem-vindo ao {app_name}.</p><p>Oi, {order_name}, Obrigado por Compras</p><p>Recebemos seu pedido de compra, nós 'll estar em contato em breve!</p><p>Obrigado,</p>{<p>app_name</p>}<p>{order_url}</p>",
                    'he' => '<p>שלום, &nbsp;</p><p>ברוכים הבאים אל {app_name}.</p><p>היי, {order_name}, תודה על Shopping</p><p>קיבלנו את בקשת הרכש שלכם, נהיה בקשר בקרוב!</p><p>תודה,</p><p>{app_name}</p><p>{order_url}</p>',
                    'tr' => '<p>Merhaba, &nbsp;</p><p>{ app_name } olanağına hoş geldiniz.</p><p>Merhaba, { order_name }, Alışveriş için teşekkür ederiz</p><p>Satın alma talebinizi aldık, kısa bir süre sonra iletişim halinde olacağız!</p><p>Teşekkürler,</p><p>{ app_name }</p><p>{ order_url }</p>',
                ],
            ],
            'Status Change' => [
                'subject' => 'Order Status',
                'lang' => [
                    'ar' => '<p> مرحبًا ، </p> <p> مرحبًا بك في {app_name}. </p> <p> طلبك هو {order_status}! </p> <p> مرحبًا {order_name} ، شكرًا لك على التسوق </p> <p> شكرًا ، </ p> <p> {app_name} </p> <p> {order_url} </p>',
                    'da' => '<p>Hej, &nbsp;</p><p>Velkommen til {app_name}.</p><p>Din ordre er {order_status}!</p><p>Hej {order_navn}, Tak for at Shopping</p><p>Tak,</p><p>{app_navn}</p><p>{order_url}</p>',
                    'de' => '<p>Hello, &nbsp;</p><p>Willkommen bei {app_name}.</p><p>Ihre Bestellung lautet {order_status}!</p><p>Hi {order_name}, Danke für Shopping</p><p>Danke,</p><p>{app_name}</p><p>{order_url}</p>',
                    'en' => '<p>Hello,&nbsp;</p><p>Welcome to {app_name}.</p><p>Your Order is {order_status}!</p><p>Hi {order_name}, Thank you for Shopping</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'es' => '<p>Hola, &nbsp;</p><p>Bienvenido a {app_name}.</p><p>Your Order is {order_status}!</p><p>Hi {order_name}, Thank you for Shopping</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'fr' => '<p>Bonjour, &nbsp;</p><p>Bienvenue dans {app_name}.</p><p>Votre commande est {order_status} !</p><p>Hi {order_name}, Thank you for Shopping</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'it' => '<p>Ciao, &nbsp;</p><p>Benvenuti in {app_name}.</p><p>Il tuo ordine è {order_status}!</p><p>Ciao {order_name}, Grazie per Shopping</p><p>Grazie,</p><p>{app_name}</p><p>{order_url}</p>',
                    'ja' => '<p>Ciao, &nbsp;</p><p>Benvenuti in {app_name}.</p><p>Il tuo ordine è {order_status}!</p><p>Ciao {order_name}, Grazie per Shopping</p><p>Grazie,</p><p>{app_name}</p><p>{order_url}</p>',
                    'nl' => '<p>Hallo, &nbsp;</p><p>Welkom bij {app_name}.</p><p>Uw bestelling is {order_status}!</p><p>Hi {order_name}, Dank u voor Winkelen</p><p>Bedankt,</p><p>{app_name}</p><p>{order_url}</p>',
                    'pl' => '<p>Hello, &nbsp;</p><p>Witamy w aplikacji {app_name}.</p><p>Twoje zamówienie to {order_status}!</p><p>Hi {order_name}, Dziękujemy za zakupy</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'ru' => '<p>Здравствуйте, &nbsp;</p><p>Вас приветствует {app_name}.</p><p>Ваш заказ-{order_status}!</p><p>Hi {order_name}, Thank you for Shopping</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                    'pt' => '<p>Olá,&nbsp;</p><p><span style="font-size: 1rem;">Bem-vindo a {app_name}.</span></p><p><span style="font-size: 1rem;">Sua Ordem é {order_status}!</span><br></p><p><span style="font-size: 1rem;">Oi {order_name}, Obrigado por Shopping</span><br></p><p><span style="font-size: 1rem;">Obrigado,</span><br></p><p><span style="font-size: 1rem;">{app_name}</span><br></p><p><span style="font-size: 1rem;">{order_url}</span><br></p>',
                    'zh' => '<p>Hello，</p><p><span style="font-size: 1rem;">歡迎使用 {app_name}.</span></p><p><span style="font-size: 1rem;">您的訂單是 {order_status}！</span><br></p><p><span style="font-size: 1rem;">Hi {order_name}，感謝購物</span><br><span style="font-size: 1rem;">謝謝您，</span><br></p><p><span style="font-size: 1rem;">{app_name}</span><br></p><p><span style="font-size: 1rem;">{order_url}</span><br></p>',
                    'pt-br' => "<p>Olá,&nbsp;</p><p>bem-vindo ao {app_name}.</p><p>Seu pedido é {order_status}!</p>Oi {order_name}, Obrigado <p>por Compras Obrigado</p>,{<p>app_name</p>}<p>{order_url}</p>'<p>,</p>",
                    'he' => '<p>שלום, &nbsp;</p><p><span style="font-size: 1rem;">ברוכים הבאים אל {app_name}.</span></p><p><span style="font-size: 1rem;">ההזמנה שלכם היא {order_status}!</span><p><br><span style="font-size: 1rem;"></p>{order_name}, תודה על Shopping</span><br><span style="font-size: 1rem;">תודה לכם,</span><br><p><span style="font-size: 1rem;"></p>app_name}</span><br></p><p><span style="font-size: 1rem;">{order_url}</span><br></p>',
                    'tr' => '<p>Merhaba, &nbsp;</p><p>{ app_name } olanağına hoş geldiniz.</p><p>Siparişiniz { order_status }!</p><p>Merhaba { order_name }, Alışveriş için teşekkür ederiz</p><p>Teşekkürler,</p><p>{ app_name }</p><p>{ order_url }</p>',
                ],
            ],


            'Order Created For Owner' => [
                'subject' => 'Order Complete',
                'lang' => [
                    'ar' => '<p>&lt;p&gt;مرحبا ،&lt;/p&gt;&lt;p&gt;عزيزي { wowner_name }.&lt;/p&gt;&lt;p&gt;هذا هو التأكيد لأمر التأكيد { order_id } في&lt;span style="font-size: 1rem;"&gt;{ order_date }.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;شكرا&lt;/p&gt;&lt;p&gt;{ order_url }&lt;/p&gt;<br></p>',
                    'da' => '<p>&lt;p&gt;Velkommen,&lt;/p&gt;&lt;p&gt;Kære { owner_name }.&lt;/p&gt;&lt;p&gt;Dette er bekræftelsen af bekræftelsen af bekræftelseskommandoen { order_id } i&lt;span style="font-size: 1rem;"&gt;{ order_date }.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;Tak,&lt;/p&gt;&lt;p&gt;{ order_url }&lt;/p&gt;<br></p>',
                    'de' => '<p>&lt;p&gt;Willkommen,&lt;/p&gt;&lt;p&gt;Liebe {owner_name}.&lt;/p&gt;&lt;p&gt;Dies ist die Bestätigung des Bestätigungsbefehls {order_id} in&lt;span style="font-size: 1rem;"&gt;{order_date}.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;Danke,&lt;/p&gt;&lt;p&gt;{order_url}&lt;/p&gt;<br></p>',
                    'en' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>This is Confirmation Order {order_id} place on&nbsp;<span style="font-size: 1rem;">{order_date}.</span></p><p>Thanks,</p><p>{order_url}</p>',
                    'es' => '<p>&lt;p&gt;Bienvenido,&lt;/p&gt;&lt;p&gt;Estimado {owner_name}.&lt;/p&gt;&lt;p&gt;Esta es la confirmación del mandato de confirmación {order_id} en&lt;span style="font-size: 1rem;"&gt;{order_date}.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;Gracias,&lt;/p&gt;&lt;p&gt;{order_url}&lt;/p&gt;<br></p>',
                    'fr' => '<p>&lt;p&gt;Bienvenue,&lt;/p&gt;&lt;p&gt;Cher { owner_name }.&lt;/p&gt;&lt;p&gt;Voici la confirmation de la commande de confirmation { order_id } dans&lt;span style="font-size: 1rem;"&gt;{ order_date }.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;Merci,&lt;/p&gt;&lt;p&gt;{ order_url }&lt;/p&gt;<br></p>',
                    'it' => '<p>&lt;p&gt;Benvenuti,&lt;/p&gt;&lt;p&gt;Caro {owner_name}.&lt;/p&gt;&lt;p&gt;Questa è la conferma del comando di conferma {order_id} in&lt;span style="font-size: 1rem;"&gt;{order_date}.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;Grazie,&lt;/p&gt;&lt;p&gt;{order_url}&lt;/p&gt;<br></p>',
                    'ja' => '<p>&lt;p&gt;ようこそ&lt;/p&gt;&lt;p&gt;Dear {owner_name}。&lt;/p&gt;&lt;p&gt;これは、&lt;span style="font-size:1rem;"&gt;{order_date}.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;{order_url}&lt;/span&gt;の確認コマンド {order_id} の確認です。&lt;/p&gt;&lt;p&gt;{order_url}&lt;/p&gt;<br></p>',
                    'nl' => '<p>&lt;p&gt;Welkom,&lt;/p&gt;&lt;p&gt;Beste { owner_name }.&lt;/p&gt;&lt;p&gt;Dit is de bevestiging van de bevestigingsopdracht { order_id } in&lt;span style="font-size: 1rem;"&gt;{ order_date }.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;Bedankt,&lt;/p&gt;&lt;p&gt;{ order_url }&lt;/p&gt;<br></p>',
                    'pl' => '<p>&lt;p&gt;Witamy,&lt;/p&gt;&lt;p&gt;Szanowny Panie {owner_name }.&lt;/p&gt;&lt;p&gt;To jest potwierdzenie komendy potwierdzenia {order_id } w&lt;span style="font-size: 1rem;"&gt;{order_date }.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;Thanks,&lt;/p&gt;&lt;p&gt;{order_url }&lt;/p&gt;<br></p>',
                    'ru' => '<p>&lt;p&gt;Добро пожаловать,&lt;/p&gt;&lt;p&gt;Уважаемый { owner_name }.&lt;/p&gt;&lt;p&gt;Это подтверждение команды подтверждения { order_id } в&lt;span style="font-size: 1rem;"&gt;{ order_date }.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;Спасибо,&lt;/p&gt;&lt;p&gt;{ urder_url }&lt;/p&gt;<br></p>',
                    'pt' => '<p>Olá,&nbsp;</p><p><span style="font-size: 1rem;">Querido {owner_name}.</span><br></p><p><span style="font-size: 1rem;">Este é o Confirmação Order {order_id} place on {order_date}.</span><br></p><p><span style="font-size: 1rem;">Obrigado,</span><br></p><p><span style="font-size: 1rem;">{order_url}</span><br></p>',
                    'zh' => '<p>您好，</p><p>尊敬的 {owner_name}。</p><p>这是<span style="font-size: 1rem;">{order_date}上的确认订单 {order_id} 场所。</span></p><p>谢谢，</p><p>{order_url}</p>',
                    'pt-br' => '<p>Olá,&nbsp;</p><p>caro {owner_name}.</p><p>Esta é a Ordem de Confirmação {order_id} colocada em&nbsp;<span style="font-size: 1rem;">{order_date}.</span></p><p>Obrigado</p>,<p>{order_url}</p>',
                    'he' => '<p>שלום, &nbsp;</p><p>היקר {owner_name}.</p><p>זוהי הזמנת אישור {order_id} מקום ב &nbsp;<span style="font-size: 1rem;">{order_date}.</span></p><p>תודה,</p><p>{order_url}</p>',
                    'tr' => '<p>Merhaba, &nbsp;</p><p>Sayın { owner_name }.</p><p>Bu, &nbsp;<span style="font-size: 1rem;">{ order_date }.</span></p><p>Teşekkürler,</p><p>{ order_url }</p>adresinde bulunan Onay Siparişi { order_id }.',
                ],
            ],
        ];

        $email = EmailTemplate::all();

        foreach ($email as $e) {
            foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {
                EmailTemplateLang::create(
                    [
                        'parent_id' => $e->id,
                        'lang' => $lang,
                        'subject' => $defaultTemplate[$e->name]['subject'],
                        'content' => $content,
                    ]
                );
            }
        }
    }

    public static function CustomerAuthCheck($slug = null)
    {
        if ($slug == null) {
            $slug = \Request::segment(1);
        }
        $auth_customer = Auth::guard('customers')->user();
        if (!empty($auth_customer))
        //
        {
            $store_id = Store::where('slug', $slug)->pluck('id')->first();
            $customer  = Customer::where('store_id', $store_id)->where('email', $auth_customer->email)->count();
            if ($customer > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function success_res($msg = "", $args = array())
    {

        $msg       = $msg == "" ? "success" : $msg;
        $msg_id    = 'success.' . $msg;
        $converted = \Lang::get($msg_id, $args);
        $msg       = $msg_id == $converted ? $msg : $converted;
        $json      = array(
            'flag' => 1,
            'msg' => $msg,
        );

        return $json;
    }

    public static function error_res($msg = "", $args = array())
    {

        $msg       = $msg == "" ? "error" : $msg;
        $msg_id    = 'error.' . $msg;
        $converted = \Lang::get($msg_id, $args);
        $msg       = $msg_id == $converted ? $msg : $converted;
        $json      = array(
            'flag' => 0,
            'msg' => $msg,
        );

        return $json;
    }
    public static function getPaymentSetting($store_id = null)
    {
        $data     = DB::table('store_payment_settings');
        $settings = [];
        if (\Auth::check()) {
            $store_id = \Auth::user()->current_store;
            $data     = $data->where('store_id', '=', $store_id);
        } else {
            $data = $data->where('store_id', '=', $store_id);
        }
        $data = $data->get();
        foreach ($data as $row) {
            $settings[$row->name] = $row->value;
        }
        return $settings;
    }
    public static function send_twilio_msg($to, $msg, $store)
    {
        $account_sid    = $store->twilio_sid;

        $auth_token = $store->twilio_token;

        $twilio_number = $store->twilio_from;

        $client = new Client($account_sid, $auth_token);

        $client->messages->create($to, [
            'from' => $twilio_number,
            'body' => $msg
        ]);
    }


    public static function order_create_owner($order, $owner, $store)
    {

        $msg = __("Hello,
Dear" . ' ' . $owner->name . ' ' . ",
This is Confirmation Order " . ' ' . $order->order_id . "place on" . self::dateFormat($order->created_at) . "
Thanks,");



        Utility::send_twilio_msg($store->notification_number, $msg, $store);

        //  dd('SMS Sent Successfully.');

    }

    public static function order_create_customer($order, $customer, $store)
    {
        $msg = __("Hello,
            Welcome to" . ' ' . $store->name . ' ' . ",
            Thank you for your purchase from" . ' ' . $store->name . ".
            Order Number:" . ' ' . $order->order_id . ".
            Order Date:" . ' ' . self::dateFormat($order->created_at));

        Utility::send_twilio_msg($customer->phone_number, $msg, $store);
    }

    public static function status_change_customer($order, $customer, $store)
    {
        $msg = __("Hello,
                Welcome to" . ' ' . $store->name . ' ' . ",
                Your Order is" . ' ' . $order->status . ".
                Hi" . ' ' . $order->name . ", Thank you for Shopping.
                Thanks,
            " . $store->name);

        Utility::send_twilio_msg($customer->phone_number, $msg, $store);
    }

    public static function colorset()
    {
        if (\Auth::user()) {
            if (\Auth::user()->type == 'super admin') {
                $user = \Auth::user();
                $setting = DB::table('settings')->where('created_by', $user->id)->where('store_id', '0')->pluck('value', 'name')->toArray();
            } else {
                $setting = DB::table('settings')->where('created_by', \Auth::user()->creatorId())->where('store_id', \Auth::user()->current_store)->pluck('value', 'name')->toArray();
            }
        } else {
            $user = User::where('type', 'super admin')->first();
            $setting = DB::table('settings')->where('created_by', 1)->pluck('value', 'name')->toArray();
        }
        if (!isset($setting['color'])) {
            $setting = Utility::settings();
        }
        return $setting;
    }

    public static function get_superadmin_logo()
    {
        $is_dark_mode = self::getValByName('cust_darklayout');
        if ($is_dark_mode == 'on') {
            return 'logo-light.png';
        } else {
            return 'logo-dark.png';
        }
    }
    public static function get_company_logo()
    {
        $is_dark_mode = self::getValByName('cust_darklayout');

        if ($is_dark_mode == 'on') {
            $logo = self::getValByName('cust_darklayout');
            return Utility::getValByName('company_light_logo');
        } else {
            return Utility::getValByName('company_logo');
        }
    }

    public static function upload_file($request, $key_name, $name, $path, $custom_validation = [])
    {
        try {
            $settings = Utility::getStorageSetting();


            if (!empty($settings['storage_setting'])) {

                if ($settings['storage_setting'] == 'wasabi') {

                    config(
                        [
                            'filesystems.disks.wasabi.key' => $settings['wasabi_key'],
                            'filesystems.disks.wasabi.secret' => $settings['wasabi_secret'],
                            'filesystems.disks.wasabi.region' => $settings['wasabi_region'],
                            'filesystems.disks.wasabi.bucket' => $settings['wasabi_bucket'],
                            'filesystems.disks.wasabi.endpoint' => 'https://s3.' . $settings['wasabi_region'] . '.wasabisys.com'
                        ]
                    );

                    $max_size = !empty($settings['wasabi_max_upload_size']) ? $settings['wasabi_max_upload_size'] : '2048';
                    $mimes =  !empty($settings['wasabi_storage_validation']) ? $settings['wasabi_storage_validation'] : '';
                } else if ($settings['storage_setting'] == 's3') {
                    config(
                        [
                            'filesystems.disks.s3.key' => $settings['s3_key'],
                            'filesystems.disks.s3.secret' => $settings['s3_secret'],
                            'filesystems.disks.s3.region' => $settings['s3_region'],
                            'filesystems.disks.s3.bucket' => $settings['s3_bucket'],
                            'filesystems.disks.s3.use_path_style_endpoint' => false,
                        ]
                    );
                    $max_size = !empty($settings['s3_max_upload_size']) ? $settings['s3_max_upload_size'] : '2048';
                    $mimes =  !empty($settings['s3_storage_validation']) ? $settings['s3_storage_validation'] : '';
                } else {
                    $max_size = !empty($settings['local_storage_max_upload_size']) ? $settings['local_storage_max_upload_size'] : '2048';

                    $mimes =  !empty($settings['local_storage_validation']) ? $settings['local_storage_validation'] : '';
                }


                $file = $request->$key_name;


                if (count($custom_validation) > 0) {
                    $validation = $custom_validation;
                } else {

                    $validation = [
                        'mimes:' . $mimes,
                        'max:' . $max_size,

                    ];
                }

                $validator = \Validator::make($request->all(), [

                    $key_name => $validation
                ]);

                if ($validator->fails()) {
                    $res = [
                        'flag' => 0,
                        'msg' => $validator->messages()->first(),
                    ];
                    return $res;
                } else {

                    $name = $name;

                    if ($settings['storage_setting'] == 'local') {
                        $request->$key_name->move(storage_path($path), $name);
                        $path = $path . $name;
                    } else if ($settings['storage_setting'] == 'wasabi') {

                        $path = \Storage::disk('wasabi')->putFileAs(
                            $path,
                            $file,
                            $name
                        );

                        // $path = $path.$name;

                    } else if ($settings['storage_setting'] == 's3') {

                        $path = \Storage::disk('s3')->putFileAs(
                            $path,
                            $file,
                            $name
                        );
                        // $path = $path.$name;
                        // dd($path);
                    }


                    $res = [
                        'flag' => 1,
                        'msg'  => 'success',
                        'url'  => $path
                    ];
                    return $res;
                }
            } else {
                $res = [
                    'flag' => 0,
                    'msg' => __('Please set proper configuration for storage.'),
                ];
                return $res;
            }
        } catch (\Exception $e) {
            $res = [
                'flag' => 0,
                'msg' => $e->getMessage(),
            ];
            return $res;
        }
    }


    public static function get_file($path)
    {

        $settings = Utility::getStorageSetting();

        try {
            if ($settings['storage_setting'] == 'wasabi') {
                config(
                    [
                        'filesystems.disks.wasabi.key' => $settings['wasabi_key'],
                        'filesystems.disks.wasabi.secret' => $settings['wasabi_secret'],
                        'filesystems.disks.wasabi.region' => $settings['wasabi_region'],
                        'filesystems.disks.wasabi.bucket' => $settings['wasabi_bucket'],
                        'filesystems.disks.wasabi.endpoint' => 'https://s3.' . $settings['wasabi_region'] . '.wasabisys.com'
                    ]
                );
            } elseif ($settings['storage_setting'] == 's3') {
                config(
                    [
                        'filesystems.disks.s3.key' => $settings['s3_key'],
                        'filesystems.disks.s3.secret' => $settings['s3_secret'],
                        'filesystems.disks.s3.region' => $settings['s3_region'],
                        'filesystems.disks.s3.bucket' => $settings['s3_bucket'],
                        'filesystems.disks.s3.use_path_style_endpoint' => false,
                    ]
                );
            }

            return \Storage::disk($settings['storage_setting'])->url($path);
        } catch (\Throwable $th) {
            return '';
        }
    }


    public static function GetLogo()
    {
        $setting = Utility::colorset();
        if (\Auth::user() && \Auth::user()->type != 'super admin') {
            if (Utility::getValByName('cust_darklayout') == 'on') {
                return Utility::getValByName('company_light_logo');
            } else {
                return Utility::getValByName('company_logo');
            }
        } else {
            if (Utility::getValByName('cust_darklayout') == 'on') {

                return Utility::getValByName('light_logo');
            } else {
                return Utility::getValByName('dark_logo');
            }
        }
    }


    public static function pixel_plateforms()
    {
        $plateforms = [
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'linkedin' => 'Linkedin',
            'pinterest' => 'Pinterest',
            'quora' => 'Quora',
            'bing' => 'Bing',
            'google-adwords' => 'Google Adwords',
            'google-analytics' => 'Google Analytics',
            'snapchat' => 'Snapchat',
            'tiktok' => 'Tiktok',
        ];

        return $plateforms;
    }

    public static function keyWiseUpload_file($request, $key_name, $name, $path, $data_key, $custom_validation = [])
    {

        $multifile = [
            $key_name => $request->file($key_name)[$data_key],
        ];

        try {
            $settings = Utility::getStorageSetting();


            if (!empty($settings['storage_setting'])) {

                if ($settings['storage_setting'] == 'wasabi') {

                    config(
                        [
                            'filesystems.disks.wasabi.key' => $settings['wasabi_key'],
                            'filesystems.disks.wasabi.secret' => $settings['wasabi_secret'],
                            'filesystems.disks.wasabi.region' => $settings['wasabi_region'],
                            'filesystems.disks.wasabi.bucket' => $settings['wasabi_bucket'],
                            'filesystems.disks.wasabi.endpoint' => 'https://s3.' . $settings['wasabi_region'] . '.wasabisys.com'
                        ]
                    );

                    $max_size = !empty($settings['wasabi_max_upload_size']) ? $settings['wasabi_max_upload_size'] : '2048';
                    $mimes =  !empty($settings['wasabi_storage_validation']) ? $settings['wasabi_storage_validation'] : '';
                } else if ($settings['storage_setting'] == 's3') {
                    config(
                        [
                            'filesystems.disks.s3.key' => $settings['s3_key'],
                            'filesystems.disks.s3.secret' => $settings['s3_secret'],
                            'filesystems.disks.s3.region' => $settings['s3_region'],
                            'filesystems.disks.s3.bucket' => $settings['s3_bucket'],
                            'filesystems.disks.s3.use_path_style_endpoint' => false,
                        ]
                    );
                    $max_size = !empty($settings['s3_max_upload_size']) ? $settings['s3_max_upload_size'] : '2048';
                    $mimes =  !empty($settings['s3_storage_validation']) ? $settings['s3_storage_validation'] : '';
                } else {
                    $max_size = !empty($settings['local_storage_max_upload_size']) ? $settings['local_storage_max_upload_size'] : '2048';

                    $mimes =  !empty($settings['local_storage_validation']) ? $settings['local_storage_validation'] : '';
                }


                $file = $request->$key_name;


                if (count($custom_validation) > 0) {
                    $validation = $custom_validation;
                } else {

                    $validation = [
                        'mimes:' . $mimes,
                        'max:' . $max_size,
                    ];
                }

                $validator = \Validator::make($multifile, [
                    $key_name => $validation
                ]);


                if ($validator->fails()) {
                    $res = [
                        'flag' => 0,
                        'msg' => $validator->messages()->first(),
                    ];
                    return $res;
                } else {

                    $name = $name;

                    if ($settings['storage_setting'] == 'local') {

                        \Storage::disk()->putFileAs(
                            $path,
                            $request->file($key_name)[$data_key],
                            $name
                        );


                        $path = $path . $name;
                    } else if ($settings['storage_setting'] == 'wasabi') {

                        $path = \Storage::disk('wasabi')->putFileAs(
                            $path,
                            $file,
                            $name
                        );

                        // $path = $path.$name;

                    } else if ($settings['storage_setting'] == 's3') {

                        $path = \Storage::disk('s3')->putFileAs(
                            $path,
                            $file,
                            $name
                        );
                    }


                    $res = [
                        'flag' => 1,
                        'msg'  => 'success',
                        'url'  => $path
                    ];
                    return $res;
                }
            } else {
                $res = [
                    'flag' => 0,
                    'msg' => __('Please set proper configuration for storage.'),
                ];
                return $res;
            }
        } catch (\Exception $e) {
            $res = [
                'flag' => 0,
                'msg' => $e->getMessage(),
            ];
            return $res;
        }
    }


    public static function GetCacheSize()
    {
        $file_size = 0;
        foreach (\File::allFiles(storage_path('/framework')) as $file) {
            $file_size += $file->getSize();
        }
        $file_size = number_format($file_size / 1000000, 4);
        return $file_size;
    }

    public static function webhook($module, $slug)
    {
        $store = Store::where('slug', $slug)->first();
        $webhook = Webhook::where('module', $module)->where('store_id', '=', $store)->first();
        if (!empty($webhook)) {
            $url = $webhook->url;
            $method = $webhook->method;
            $reference_url  = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            $data['method'] = $method;
            $data['reference_url'] = $reference_url;
            $data['url'] = $url;
            return $data;
        }
        return false;
    }

    public static function WebhookCall($url = null, $parameter = null, $method = '')
    {
        if (!empty($url) && !empty($parameter)) {
            try {
                $curlHandle = curl_init($url);
                curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $parameter);
                curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, $method);
                $curlResponse = curl_exec($curlHandle);
                curl_close($curlHandle);
                if (empty($curlResponse)) {
                    return true;
                } else {
                    return false;
                }
            } catch (\Throwable $th) {
                return false;
            }
        }
    }

    public static function updateStorageLimit($user_id, $image_size)
    {
        $image_size = number_format($image_size / 1048576, 2);
        $user   = User::find($user_id);
        $plan   = Plan::find($user->plan);
        $total_storage = $user->storage_limit + $image_size;
        if ($plan->storage_limit <= $total_storage && $plan->storage_limit != -1) {
            $error = __('Plan storage limit is over so please upgrade the plan.');
            return $error;
        } else {
            $user->storage_limit = $total_storage;
        }
        $user->save();
        return 1;
    }

    public static function changeStorageLimit($user_id, $file_path)
    {
        $files =  \File::glob(storage_path($file_path));
        $fileSize = 0;
        foreach ($files as $file) {
            $fileSize += \File::size($file);
        }

        $image_size = number_format($fileSize / 1048576, 2);
        $user   = User::find($user_id);
        $plan   = Plan::find($user->plan);
        $total_storage = $user->storage_limit - $image_size;
        $user->storage_limit = $total_storage;
        $user->save();

        $status = false;
        foreach ($files as $key => $file) {
            if (\File::exists($file_path)) {
                $status = \File::delete($file_path);
            }
        }

        return true;
    }

    public static function flagOfCountry()
    {
        $arr = [
            'ar' => '🇦🇪 ar',
            'da' => '🇩🇰 da',
            'de' => '🇩🇪 de',
            'es' => '🇪🇸 es',
            'fr' => '🇫🇷 fr',
            'it' =>  '🇮🇹 it',
            'ja' => '🇯🇵 ja',
            'nl' => '🇳🇱 nl',
            'pl' => '🇵🇱 pl',
            'ru' => '🇷🇺 ru',
            'pt' => '🇵🇹 pt',
            'en' => '🇮🇳 en',
            'tr' => '🇹🇷 tr',
            'pt-br' => '🇵🇹 pt-br',
        ];
        return $arr;
    }

    public static function user_plan($user_id = null)
    {
        if (isset($user_id)) {
            $user_id;
        } else {
            $user_id = \Auth::user()->id;
        }
        $user = User::where('id', $user_id)->get()->first();
        if (\Auth::check()) {
            if (isset($user) && isset($user->plan)) {
                $plan = Plan::where('id', $user->plan)->first();
                $data = [
                    'enable_custdomain' => $plan->enable_custdomain,
                    'enable_custsubdomain' => $plan->enable_custsubdomain,
                    'shipping_method' => $plan->shipping_method,
                    'pwa_store' => $plan->pwa_store,
                    'enable_chatgpt' => $plan->enable_chatgpt
                ];
            }
            return $data;
        }
    }


    public static function Analytics($slug = null)
    {
        if ($slug != null) {
            $whichbrowser = new \WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
            if ($whichbrowser->device->type == 'bot') {
                return false;
            }
            try {
                /* Detect extra details about the user */

                $browser_name = $whichbrowser->browser->name ?? null;
                $os_name = $whichbrowser->os->name ?? null;
                $browser_language = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? mb_substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : null;
                $device_type = self::get_device_type($_SERVER['HTTP_USER_AGENT']);
                $referrer = isset($_SERVER['HTTP_REFERER']) ? parse_url($_SERVER['HTTP_REFERER']) : null;

                // $ip = $_SERVER['REMOTE_ADDR'];
                // $ip = '103.136.43.5'; // your ip address here
                $ip = '49.36.83.154'; // your ip address here // surat
                $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));
                $utm_source = $_GET['utm_source'] ?? null;
                $utm_medium = $_GET['utm_medium'] ?? null;
                $utm_campaign = $_GET['utm_campaign'] ?? null;
            } catch (\Throwable $th) {
                return false;
            }
            if ($query['status'] != 'fail') {
                $analytic = Analytic::whereDate('created_at', date('Y-m-d'))->where(['slug' => $slug, 'ip_address' => $query['query']])->first();
                if ($analytic) {
                    $pageview = $analytic->pageview + 1;
                } else {
                    $pageview = 1;
                }
                $data = [
                    'ip_address'         => $query['query'],
                    'country_code'       => $query['countryCode'],
                    'city_name'          => $query['city'],
                    'country_name'       => $query['country'],
                    'os_name'            => $os_name,
                    'browser_name'       => $browser_name,
                    'referrer_host'      => !empty($referrer['host']),
                    'referrer_path'      => !empty($referrer['path']),
                    'device_type'        => $device_type,
                    'browser_language'   => $browser_language,
                    'utm_source'         => $utm_source,
                    'utm_medium'         => $utm_medium,
                    'utm_campaign'       => $utm_campaign,
                    'pageview'           => $pageview,
                    'slug'               => $slug,
                ];

                Analytic::whereDate('created_at', date('Y-m-d'))->updateOrCreate(['slug' => $slug, 'ip_address' => $query['query']], $data);
            }
        }
    }
    public static function get_device_type($user_agent)
    {
        $mobile_regex = '/(?:phone|windows\s+phone|ipod|blackberry|(?:android|bb\d+|meego|silk|googlebot) .+? mobile|palm|windows\s+ce|opera mini|avantgo|mobilesafari|docomo)/i';
        $tablet_regex = '/(?:ipad|playbook|(?:android|bb\d+|meego|silk)(?! .+? mobile))/i';

        if (preg_match_all($mobile_regex, $user_agent)) {
            return 'mobile';
        } else {

            if (preg_match_all($tablet_regex, $user_agent)) {
                return 'tablet';
            } else {
                return 'desktop';
            }
        }
    }
}
