<?php

namespace CoreUIDemo;

use OLOG\ActionInterface;
use OLOG\AdminLTE\LayoutCoreUI;
use OLOG\Layouts\AdminLayoutSelector;
use OLOG\Layouts\MenuInterface;
use OLOG\Layouts\PageTitleInterface;
use OLOG\Layouts\TopActionObjInterface;
use OLOG\MaskActionInterface;

class DemoAction2 implements
    MaskActionInterface,
    PageTitleInterface,
    TopActionObjInterface,
    MenuInterface
{
    protected $id;

    static public function menuArr()
    {
        return DemoMenu::menuArr();
    }

    public function __construct($id)
    {
        $this->id = $id;
    }

    static public function mask(){
        return '/action2/(\d+)';
    }

    public function url(){
        return '/action2/' . $this->id;
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

        AdminLayoutSelector::render($html, $this);
    }
}