<?php

namespace CoreUIDemo;


use OLOG\Layouts\MenuInterface;
use OLOG\Layouts\MenuItem;

class DemoMenu implements MenuInterface
{
    static public function menuArr(){
        return [
            new MenuItem('Admin', (new DemoAdminAction())->url(), [], 'fa fa-th-list'),
            new MenuItem('Actions 2&3', '#', [
                new MenuItem('Action 2', (new DemoAction2(1))->url(), [], 'fa fa-record'),
                new MenuItem('Action 3', (new DemoAction3(1))->url(), [], 'fa fa-record')
            ], 'fa fa-home'),
            new MenuItem('567', '', [
                new MenuItem('678', '/4'),
                new MenuItem('789', '/5')
            ])
        ];
    }
}