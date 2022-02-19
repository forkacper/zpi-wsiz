<!DOCTYPE html>
<html lang="pl">
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title><?= ucfirst($page) ?> - Aplikacja do zarządzania transportem</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="">
    <link rel="icon" type="image/png" sizes="32x32" href="../../public/images/ms-icon-310x310.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../../public/styles/core.css">
    <link rel="stylesheet" type="text/css" href="../../public/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/styles/style.css">

</head>
<body>
<div class="pre-loader">
    <div class="pre-loader-box">
        <div class="loader-logo"><img width="200" height="200" src="../../public/images/logo-trans-zpi.png" alt=""></div>
        <div class='loader-progress' id="progress_div">
            <div class='bar' id='bar1'></div>
        </div>
        <div class='percent' id='percent1'>0%</div>
        <div class="loading-text">
            Ładowanie...
        </div>
    </div>
</div>
