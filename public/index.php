<?php

require_once '../vendor/autoload.php';

\Config\Config::init();

\OLOG\Router::action(\CoreUIDemo\DemoAdminAction::class, 0);
\OLOG\Router::action(\CoreUIDemo\DemoAction2::class, 0);
\OLOG\Router::action(\CoreUIDemo\DemoAction3::class, 0);
\OLOG\Router::action(\CoreUIDemo\DemoMainPageAction::class, 0);