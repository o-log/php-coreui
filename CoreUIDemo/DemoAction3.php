<?php

namespace CoreUIDemo;

use OLOG\Layouts\AdminLayoutSelector;
use OLOG\Layouts\MenuInterface;
use OLOG\Layouts\PageTitleInterface;
use OLOG\Layouts\TopActionObjInterface;
use OLOG\MaskActionInterface;

class DemoAction3 implements
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
        return '/action3/(\d+)';
    }

    public function url(){
        return '/action3/' . $this->id;
    }

    public function pageTitle(){
        return 'Action 3: ' . $this->id;
    }

    public function topActionObj(){
        return new DemoAdminAction();
    }

    public function action(){
        $html = '';

        $html .= '<div>TEST ACTION 3 ' . $this->id . '</div>';

        AdminLayoutSelector::render($html, $this);
    }
}