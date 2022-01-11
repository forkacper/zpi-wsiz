<?php
declare(strict_types=1);

if($page === 'login') {
    require_once ('layout/head.php');
    require_once ("templates/pages/$page.php");
    require_once ('layout/footer.php');
} else {
    require_once ('layout/head.php');
    require_once ('layout/header.php');
    require_once ('layout/left-panel.php');
    !($page == 'dashboard') ? require_once('layout/breadcrumb.php') : '';
    require_once ("templates/pages/$page.php");
    require_once ('layout/footer.php');
}

