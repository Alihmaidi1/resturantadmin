<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;


    function saveimage($diskName,$image,$folder){
        $logo=time().rand(0,9999999).".".$image->getClientOriginalExtension();
        $path=Storage::disk($diskName)->putFileAs($folder,$image,$logo);
        return $path;
    }


    function adddisk($name,$aws_access_key,$aws_secret_access,$aws_region,$aws_bucket){

        $disks=Config::get("filesystems.disks");
        $disks[$name]=[
            'driver' => 's3',
            'key' => $aws_access_key,
            'secret' => $aws_secret_access,
            'region' => $aws_region,
            'bucket' => $aws_bucket,
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ];
        config(['filesystems.disks' => $disks]);
        $fp = fopen(base_path() .'/config/filesystems.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('filesystems'), true) . ';');
        fclose($fp);


    }


    function deletedisk($name){
        $disks=Config::get("filesystems.disks");
        unset($disks[$name]);
        config(['filesystems.disks' => $disks]);
        $fp = fopen(base_path() .'/config/filesystems.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('filesystems'), true) . ';');
        fclose($fp);

    }

    function updateEnv($data = array())
    {
        if (!count($data)) {
            return;
        }

        $pattern = '/([^\=]*)\=[^\n]*/';

        $envFile = base_path() . '/.env';
        $lines = file($envFile);
        $newLines = [];
        foreach ($lines as $line) {
            preg_match($pattern, $line, $matches);

            if (!count($matches)) {
                $newLines[] = $line;
                continue;
            }

            if (!key_exists(trim($matches[1]), $data)) {
                $newLines[] = $line;
                continue;
            }

            $line = trim($matches[1]) . "={$data[trim($matches[1])]}\n";
            $newLines[] = $line;
        }

        $newContent = implode('', $newLines);
        file_put_contents($envFile, $newContent);
    }



    function tokenInfo($email,$password,$provider="admins"){

        $client= DB::table('oauth_clients')->where("provider",$provider)->first();
        return Http::asForm()->post(request()->root()."/oauth/token",[
                'grant_type' => 'password',
                'client_id' =>$client->id,
                'client_secret' => $client->secret ,
                'username' => $email ,
                'password' => $password
        ]);


    }



    function refreshToken($refreshToken,$provider="admins"){
        $client=DB::table('oauth_clients')->where("provider",$provider)->first();
        return  Http::asForm()->post(request()->root()."/oauth/token",[
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken,
            'client_id' => $client->id,
            'client_secret' => $client->secret,
        ]);
    }


    function changeDatabaseConnection($databaseName,$resturant_id=null){

        DB::purge("system");
        Config::set("database.connections.tenant.database",$databaseName);
            Config::set("database.default", "tenant");
        DB::reconnect("tenant");
        Config::set("global.resturant_id", $resturant_id);
        DB::setDefaultConnection("tenant");
        return true;

    }


    function addSetting($name){

    $setting=[
        "paypal_client_id"=>null,
        "paypal_secret"=>null,
        "status"=>1,
        "phone"=>null,
        "meta_title_en"=>null,
        "meta_title_ar"=>null,
        "meta_description_en"=>null,
        "meta_description_ar"=>null,
        "meta_keyword"=>null,
        "meta_logo"=>null,
        "balance_status"=>null,
        "balance_charge"=>null,
        "currency_id"=>null,
        "open_at"=>null,
        "close_at"=>null,
        "day_open_en"=>null,
        "day_open_ar"=>null,
        "facebook_status"=>null,
        "facebook_link"=>null,
        "whatsapp_status"=>null,
        "whatsapp_link"=>null,
        "telegram_status"=>null,
        "telegram_link"=>null,
        "instagram_status"=>null,
        "instagram_link"=>null,
        "twitter_status"=>null,
        "twitter_link"=>null,
        "paypal_status"=>null,
        "owner_name"=>null,
        "logo"=>null,
        

    ];
    $settings = config("setting");
    $settings[$name] = $setting;
    config(['setting' => $settings]);
    $fp = fopen(base_path() .'/config/setting.php' , 'w');
    fwrite($fp, '<?php return ' . var_export(config('setting'), true) . ';');
    fclose($fp);


    }


    function deletesetting($name){

    $settings = config("setting");
    unset($settings[$name]);
    config(['setting' => $settings]);
    $fp = fopen(base_path() .'/config/setting.php' , 'w');
    fwrite($fp, '<?php return ' . var_export(config('setting'), true) . ';');
    fclose($fp);

    }

