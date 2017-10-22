<?php

namespace OLOG\CoreUI;

use OLOG\ActionInterface;
use OLOG\HTML;
use OLOG\Layouts\CurrentUserNameInterface;
use OLOG\Layouts\LayoutInterface;
use OLOG\Layouts\MenuInterface;
use OLOG\Layouts\MenuItem;
use OLOG\Layouts\PageTitleInterface;
use OLOG\Layouts\PageToolbarHtmlInterface;
use OLOG\Layouts\SiteTitleInterface;
use OLOG\Layouts\TopActionObjInterface;
use OLOG\Url;

class LayoutCoreUI implements
	LayoutInterface
{

	static public function render($content_html_or_callable, $action_obj = null)
	{
		$breadcrumbs_arr = [];

		$h1_str = '&nbsp;';
		$menu_arr = [];

		$site_title = 'HOME';

		$page_title = $site_title;
		$user_name = 'Неизвестный пользователь';
		$page_toolbar_html = '';

		if ($action_obj) {
			// запрашиваем до того как чтото будет выводиться на страницу, потому что там может быть редирект или еще какая-то работа с хидерами
			if ($action_obj instanceof PageToolbarHtmlInterface) {
				$page_toolbar_html = $action_obj->pageToolbarHtml();
			}

			if ($action_obj instanceof CurrentUserNameInterface) {
				$user_name = $action_obj->currentUserName();
			}

			if ($action_obj instanceof SiteTitleInterface) {
				$site_title = $action_obj->siteTitle();
			}

			if ($action_obj instanceof TopActionObjInterface) {
				$top_action_obj = $action_obj->topActionObj();
				$extra_breadcrumbs_arr = [];

				while ($top_action_obj) {
					$top_action_title = '#NO_TITLE#';
					if ($top_action_obj instanceof PageTitleInterface) {
						$top_action_title = $top_action_obj->pageTitle();
					}

					$top_action_url = '#NO_URL#';
					if ($top_action_obj instanceof ActionInterface) {
						$top_action_url = $top_action_obj->url();
					}

					array_unshift($extra_breadcrumbs_arr, HTML::a($top_action_url, $top_action_title));

					if ($top_action_obj instanceof TopActionObjInterface) {
						if ($top_action_obj != $top_action_obj->topActionObj()) {
							$top_action_obj = $top_action_obj->topActionObj();
							continue;
						}
					}

					$top_action_obj = null;
				}

				$breadcrumbs_arr = array_merge($breadcrumbs_arr, $extra_breadcrumbs_arr);
			}

			if ($action_obj instanceof PageTitleInterface) {
				$h1_str = $action_obj->pageTitle();
				$page_title = $h1_str;
			}

			if ($action_obj instanceof MenuInterface) {
				$menu_arr = $action_obj::menuArr();
			}
		}

		?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="...">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,jQuery,CSS,HTML,RWD,Dashboard">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>...</title>

    <!-- Icons -->
    <link href="/assets/font-awesome/font-awesome.css" rel="stylesheet">
    <!--<link href="assets/css/simple-line-icons.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">


    <!-- Main styles for this application -->
    <link href="/assets/coreui/css/style.css" rel="stylesheet">

    <!-- Bootstrap and necessary plugins -->
    <!--<script src="js/libs/jquery.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!--<script src="js/libs/tether.min.js"></script>-->
    <script src="/assets/bootstrap4/assets/js/vendor/popper.min.js"></script>
    <script src="/assets/bootstrap4/js/bootstrap.js"></script>
    <!--<script src="js/libs/pace.min.js"></script>-->

    <!-- Main scripts -->
    <script src="/assets/coreui/js/app.js"></script>

</head>

<!-- BODY options, add following classes to body to change options

// Header options
1. '.header-fixed'		- Fixed Header

// Sidebar options
1. '.sidebar-fixed'		- Fixed Sidebar
2. '.sidebar-hidden'		- Hidden Sidebar
3. '.sidebar-off-canvas'	- Off Canvas Sidebar
4. '.sidebar-minimized'		- Minimized Sidebar (Only icons)
5. '.sidebar-compact'		- Compact Sidebar

// Aside options
1. '.aside-menu-fixed'		- Fixed Aside Menu
2. '.aside-menu-hidden'		- Hidden Aside Menu
3. '.aside-menu-off-canvas'     - Off Canvas Aside Menu

// Footer options
1. 'footer-fixed'		- Fixed footer

-->

<body class="app">
<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
    <a class="navbar-brand" href="#"></a>
    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item">
            <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">...</a>
        </li>
    </ul>
</header>
<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> Dashboard <span class="badge badge-info">NEW</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="...">...</a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main content -->
    <main class="main">
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            ...
        </ol>
        <div class="container-fluid">

                <?php
                if (is_callable($content_html_or_callable)) {
                    $content_html_or_callable();
                } else {
                    echo $content_html_or_callable;
                }
                ?>

        </div>
    </main>

    <aside class="aside-menu">
        ...
    </aside>

</div>

<footer class="app-footer">
    ...
</footer>

</body>
</html><?php
	}

	static public function isRequestedPage($menu_item_obj)
	{

		if ($menu_item_obj->getUrl() == Url::current()) {
			return true;
		}

		$children_arr = $menu_item_obj->getChildrenArr();
		foreach ($children_arr as $child_menu_item_obj) {
			if ($child_menu_item_obj->getUrl() == Url::current()) {
				return true;
			}
		}

		return false;
	}
}