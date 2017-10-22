<?php

namespace CoreUIDemo;

use OLOG\Layouts\CurrentUserNameInterface;

class DemoActionsBase implements CurrentUserNameInterface
{
    public function currentUserName()
    {
        return 'admin';
    }
}