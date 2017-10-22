<?php

namespace CoreUIDemo;


use OLOG\Layouts\MenuInterface;
use OLOG\Layouts\MenuItem;

class DemoMenu implements MenuInterface
{
    static public function menuArr(){
        return [
            new MenuItem('123', '/', [], 'glyphicon glyphicon-th-list'),
            new MenuItem('234', '', [
                new MenuItem('345', '/2', [], 'glyphicon glyphicon-record'),
                new MenuItem('456', '/admin', [], 'glyphicon glyphicon-record')
            ], 'glyphicon glyphicon-home'),
            new MenuItem('567', '', [
                new MenuItem('678', '/4'),
                new MenuItem('789', '/5')
            ])
        ];
    }


}