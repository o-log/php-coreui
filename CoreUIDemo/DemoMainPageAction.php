<?php

namespace CoreUIDemo;

use OLOG\ActionInterface;
use OLOG\HTML;

class DemoMainPageAction implements
    ActionInterface
{
    public function currentPageTitle()
    {
        return 'TEST PAGE TITLE';
    }

    public function url()
    {
        return '/';
    }

    public function action()
    {
        echo '<div>' . HTML::a((new DemoAdminAction())->url(), (new DemoAdminAction())->pageTitle()) . '</div>';
    }
}