<?php

namespace CoreUIDemo;

use OLOG\ActionInterface;
use OLOG\HTML;
use OLOG\Layouts\AdminLayoutSelector;
use OLOG\Layouts\MenuInterface;
use OLOG\Layouts\PageTitleInterface;

class DemoAdminAction implements
    ActionInterface,
    PageTitleInterface,
	MenuInterface
{

    public function pageTitle()
    {
        return 'Admin';
    }

    public function url()
    {
        return '/admin';
    }

    public function pageToolbarHtml(){
        return '<a class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></a>';
    }

	static public function menuArr()
    {
	    return DemoMenu::menuArr();
    }

    public function action()
    {
        AdminLayoutSelector::render(function (){
            echo '<div>TEST CONTENT</div>';
            echo '<div>' . HTML::a((new DemoAction2(2))->url(), (new DemoAction2(2))->pageTitle()) . '</div>';
        }, $this);
    }

	public function showLayoutContentPanel()
	{
		return false;
	}

	public function overrideBackgroundColor()
    {
        return '';
    }
}