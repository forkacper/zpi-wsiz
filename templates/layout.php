<?php
declare(strict_types=1);

require_once ('layout/header.php');
require_once ('layout/left-panel.php');
!($page == 'dashboard') ? require_once('layout/breadcrumb.php') : '';
require_once ("templates/pages/$page.php");
require_once ('layout/footer.php');