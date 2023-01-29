<?php

namespace App\GraphQL\Mutations\Admin\Setting;

use App\Models\setting;
use App\repo\interfaces\settinginterface;
use Illuminate\Support\Facades\Storage;

final class Editsetting
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */

    public $setting;
    public function __construct(settinginterface $setting)
    {

        $this->setting = $setting;
    }
    public function __invoke($_, array $args)
    {
        $paypal_client_id = $args["paypal_client_id"];
        $paypal_secret = $args["paypal_secret"];
        $meta_logo = $args["meta_logo"];
        $logo = $args["logo"];
        $status=$args["status"];
        $phone=$args["phone"];
        $meta_title_en=$args["meta_title_en"];
        $meta_title_ar=$args["meta_title_ar"];
        $meta_description_en=$args["meta_description_en"];
        $meta_description_ar=$args["meta_description_ar"];
        $meta_keyword=$args["meta_keyword"];
        $balance_status=$args["balance_status"];
        $balance_charge=$args["balance_charge"];
        $currency_id=$args["currency_id"];
        $open_at=$args["open_at"];
        $close_at=$args["close_at"];
        $day_open_en=$args["day_open_en"];
        $day_open_ar=$args["day_open_ar"];
        $facebook_status=$args["facebook_status"];
        $facebook_link=$args["facebook_link"];
        $whatsapp_status=$args["whatsapp_status"];
        $whatsapp_link=$args["whatsapp_link"];
        $telegram_status=$args["telegram_status"];
        $telegram_link=$args["telegram_link"];
        $instagram_status=$args["instagram_status"];
        $instagram_link=$args["instagram_link"];
        $twitter_status=$args["twitter_status"];
        $twitter_link=$args["twitter_link"];
        $paypal_status=$args["paypal_status"];
        $owner_name=$args["owner_name"];
        $setting = $this->setting->editsetting($paypal_client_id,$paypal_secret,$meta_logo, $logo, $status, $phone, $meta_title_en, $meta_title_ar, $meta_description_en, $meta_description_ar, $meta_keyword, $balance_status, $balance_charge, $currency_id, $open_at, $close_at, $day_open_en, $day_open_ar,$facebook_status,$facebook_link,$whatsapp_status,$whatsapp_link,$telegram_status,$telegram_link,$instagram_status,$instagram_link,$twitter_status,$telegram_link,$paypal_status,$owner_name);
        $setting->message = trans("admin.the setting was updated successfully");
        return $setting;

    }
}
