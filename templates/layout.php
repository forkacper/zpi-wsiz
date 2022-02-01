<?php
declare(strict_types=1);

if($page === 'login') {
    require_once ('layout/head.php');
    require_once ("templates/pages/$page.php");
    require_once ("layout/messages.php");
    require_once ('layout/footer.php');
} else {
    require_once ('layout/head.php');
    require_once ('layout/header.php');
    switch ($_SESSION['userRole']) {
        case 'spedytor':
            require_once ('layout/left-panel-spedytor.php');
            break;
        case 'kierowca':
            require_once ('layout/left-panel-kierowca.php.php');
            break;
        case 'kontrahent':
            require_once ('layout/left-panel-kontrahent.php.php');
            break;
        default:
            require_once ('layout/left-panel.php');
            break;
    }
    !($page == 'dashboard') ? require_once('layout/breadcrumb.php') : '';
    require_once ("templates/pages/$page.php");
    require_once ("layout/messages.php");
    require_once ('layout/footer.php');
}

