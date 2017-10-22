<?php

namespace CoreUIDemo;

use OLOG\ActionInterface;
use OLOG\AdminLTE\LayoutCoreUI;
use OLOG\Layouts\MenuInterface;
use OLOG\Layouts\PageTitleInterface;
use OLOG\Layouts\TopActionObjInterface;

class DemoAction2 implements
    ActionInterface,
    PageTitleInterface,
    TopActionObjInterface,
    MenuInterface
{
    protected $id;

    static public function menuArr()
    {
        return DemoMenu::menuArr();
    }

    public function __construct($id = '(\d+)')
    {
        $this->id = $id;
    }

    public function url(){
        return '/action/' . $this->id;
    }

    public function pageTitle(){
        return 'Action ' . $this->id;
    }

    public function topActionObj(){
        return new DemoAdminAction();
    }

    public function action(){
        $html = '';

        $html .= '<div>TEST ACTION ' . $this->id . '</div>';

        LayoutCoreUI::render($html, $this);
    }
}