<?php

namespace App\GraphQL\Queries\Admin\Setting;

use App\Models\setting;
use App\repo\interfaces\settinginterface;

final class Getsetting
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

        return $this->setting->getSetting();

    }
}
