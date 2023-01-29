<?php

namespace App\repo\interfaces;

interface settinginterface{


    public function editsetting($paypal_client_id,$paypal_secret,$meta_logo,$logo,$status,$phone,$meta_title_en,$meta_title_ar,$meta_description_en,$meta_description_ar,$meta_keyword,$balance_status,$balance_charge,$currency_id,$open_at,$close_at,$day_open_en,$day_open_ar,$facebook_status,$facebook_link,$whatsapp_status,$whatsapp_link,$telegram_status,$telegram_link,$instagram_status,$instagram_link,$twitter_status,$twitter_link,$paypal_status,$owner_name);

    public function getSetting();

}