<?php

namespace App\repo\classes;

use App\Models\setting as ModelsSetting;
use App\repo\interfaces\settinginterface;
use Illuminate\Support\Facades\Storage;

class setting implements settinginterface{

    public function editsetting($paypal_client_id,$paypal_secret,$meta_logo,$logo,$status,$phone,$meta_title_en,$meta_title_ar,$meta_description_en,$meta_description_ar,$meta_keyword,$balance_status,$balance_charge,$currency_id,$open_at,$close_at,$day_open_en,$day_open_ar,$facebook_status,$facebook_link,$whatsapp_status,$whatsapp_link,$telegram_status,$telegram_link,$instagram_status,$instagram_link,$twitter_status,$twitter_link,$paypal_status,$owner_name){

        $setting = [];
        $settingmodel = new ModelsSetting();
        $settingid = (config("global.resturant_id") == "") ? "system" : config("global.resturant_id");
        
        if($meta_logo!=null ){
            if(config("setting.".$settingid.".meta_logo")!=null){

            Storage::disk("resturant:".config("global.resturant_id"))->delete(config("setting.".$settingid.".meta_logo"));

            }
            $meta_logo_name=saveimage("resturant:".config("global.resturant_id"),$meta_logo,"setting");
            $setting["meta_logo"]=$meta_logo_name;
            
        }else{


            $setting["meta_logo"]=config("setting.".$settingid.".meta_logo");


        }

        $settingmodel->meta_logo = Storage::disk("resturant:" . config("global.resturant_id"))->url($meta_logo_name);

        if($logo!=null ){

            if(config("setting.".$settingid.".logo")!=null){

            Storage::disk("resturant:".config("global.resturant_id"))->delete(config("setting.".$settingid.".logo"));


            }
            $logo_name=saveimage("resturant:".config("global.resturant_id"),$logo,"setting");
            $setting["logo"]=$logo_name;

        }else{


            $setting["logo"]=config("setting.".$settingid.".logo");


        }
        $settingmodel->logo = Storage::disk("resturant:" . config("global.resturant_id"))->url($logo_name);

        $setting["status"]=$status;
        $settingmodel->status = $status;
        $setting["paypal_client_id"]=$paypal_client_id;
        $settingmodel->paypal_client_id = $paypal_client_id;
        $setting["paypal_secret"]=$paypal_secret;
        $settingmodel->paypal_secret = $paypal_secret;
        $setting["phone"]=$phone;
        $settingmodel->phone = $phone;
        $setting["meta_title"]=["en"=>$meta_title_en,"ar"=>$meta_title_ar];        
        $settingmodel->meta_title = $setting["meta_title"][app()->getLocale()];
        $setting["meta_description"]=["en"=>$meta_description_en,"ar"=>$meta_description_ar];
        $settingmodel->meta_description = $setting["meta_description"][app()->getLocale()];
        $setting["meta_keyword"]=$meta_keyword;
        $settingmodel->meta_keyword = $meta_keyword;
        $setting["balance_status"]=$balance_status;
        $settingmodel->balance_status = $balance_status;
        $setting["balance_charge"]=$balance_charge;
        $settingmodel->balance_charge = $balance_charge;
        $setting["currency_id"]=$currency_id;
        $settingmodel->currency_id = $currency_id;
        $setting["open_at"]=$open_at;
        $settingmodel->open_at = $open_at;
        $setting["close_at"]=$close_at;
        $settingmodel->close_at = $close_at;
        $setting["day_open"]=["en"=>$day_open_en,"ar"=>$day_open_ar];
        $settingmodel->day_open = $setting["day_open"][app()->getLocale()];
        $setting["facebook_status"]=$facebook_status;
        $settingmodel->facebook_status = $facebook_status;
        $setting["facebook_link"]=$facebook_link;
        $settingmodel->facebook_link = $facebook_link;
        $setting["whatsapp_status"]=$whatsapp_status;
        $settingmodel->whatsapp_status = $whatsapp_status;
        $setting["whatsapp_link"]=$whatsapp_link;
        $settingmodel->whatsapp_link = $whatsapp_link;
        $setting["telegram_status"]=$telegram_status;
        $settingmodel->telegram_status = $telegram_status;
        $setting["telegram_link"]=$telegram_link;
        $settingmodel->telegram_link = $telegram_link;
        $setting["instagram_status"]=$instagram_status;
        $settingmodel->instagram_status = $instagram_status;
        $setting["instagram_link"]=$instagram_link;
        $settingmodel->instagram_link = $instagram_link;
        $setting["twitter_status"]=$twitter_status;
        $settingmodel->twitter_status = $twitter_status;
        $setting["twitter_link"]=$twitter_link;
        $settingmodel->twitter_link = $twitter_link;
        $setting["paypal_status"]=$paypal_status;
        $settingmodel->paypal_status = $paypal_status;
        $setting["owner_name"]=$owner_name;
        $settingmodel->owner_name = $owner_name;
        $settings = config("setting");
        $settings[$settingid] = $setting;
        config(['setting' => $settings]);
        $fp = fopen(base_path() .'/config/setting.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('setting'), true) . ';');
        fclose($fp);


        return $settingmodel;



    }

    public function getSetting(){

        $settingmodel = new ModelsSetting();
        $settingid = (config("global.resturant_id") == "") ? "system" : config("global.resturant_id");
        $setting = config("setting." . $settingid);;
        $settingmodel->meta_logo = ($setting["meta_logo"]==null)?null:Storage::disk("resturant:" . config("global.resturant_id"))->url($setting["meta_logo"]);
        $settingmodel->logo = ($setting["logo"]==null)?null:Storage::disk("resturant:" . config("global.resturant_id"))->url($setting["logo"]);
        $settingmodel->status = $setting["status"];
        $settingmodel->paypal_client_id = $setting["paypal_client_id"];
        $settingmodel->paypal_secret = $setting["paypal_secret"];
        $settingmodel->phone = $setting["phone"];
        $settingmodel->meta_title = $setting["meta_title"][app()->getLocale()];
        $settingmodel->meta_description = $setting["meta_description"][app()->getLocale()];
        $settingmodel->meta_keyword = $setting["meta_keyword"];
        $settingmodel->balance_status = $setting["balance_status"];
        $settingmodel->balance_charge = $setting["balance_charge"];
        $settingmodel->currency_id = $setting["currency_id"];
        $settingmodel->open_at =$setting["open_at"];
        $settingmodel->close_at = $setting["close_at"];
        $settingmodel->day_open = $setting["day_open"][app()->getLocale()];
        $settingmodel->facebook_status = $setting["facebook_status"];
        $settingmodel->facebook_link = $setting["facebook_link"];
        $settingmodel->whatsapp_status =$setting["whatsapp_status"];
        $settingmodel->whatsapp_link = $setting["whatsapp_link"];
        $settingmodel->telegram_status = $setting["telegram_status"];
        $settingmodel->telegram_link = $setting["telegram_link"];
        $settingmodel->instagram_status =$setting["instagram_status"];
        $settingmodel->instagram_link = $setting["instagram_link"];
        $settingmodel->twitter_status = $setting["twitter_status"];
        $settingmodel->twitter_link = $setting["twitter_link"];
        $settingmodel->paypal_status = $setting["paypal_status"];
        $settingmodel->owner_name = $setting["owner_name"];
        $settingmodel->message = trans("admin.the data was fetched successfully");
        return $settingmodel;
    }


}