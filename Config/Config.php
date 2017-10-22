<?php

namespace Config;

use OLOG\CoreUI\LayoutCoreUI;
use OLOG\Layouts\LayoutsConfig;

class Config
{
    public static function init()
    {
        // for mac
        header('Content-Type: text/html; charset=utf-8');
        date_default_timezone_set('Europe/Moscow');

        LayoutsConfig::setAdminLayoutClassName(LayoutCoreUI::class);
    }

}