<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4><?= $page ?></h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Strona główna</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $page ?></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                        <?php if($page === 'addNewOrder'): ?>
                            <img width="150" height="150" src="../../public/images/3.%20dodaj%20zlecenie.png" alt="">
                        <?php endif;?>
                        <?php if($page === 'pendingOrders'): ?>
                        <img width="150" height="150" src="../../public/images/4.%20oczekujące%20zlecenia.png" alt="">
                        <?php endif;?>
                        <?php if($page === 'ordersInProgress'): ?>
                            <img width="150" height="150" src="../../public/images/5.%20zlecenia%20w%20realizacji.png" alt="">
                        <?php endif;?>
                        <?php if($page === 'completedOrders'): ?>
                            <img width="150" height="150" src="../../public/images/6.%20zrealizowane%20zlecenia.png" alt="">
                        <?php endif;?>
                        <?php if($page === 'vehicles'): ?>
                            <img width="150" height="150" src="../../public/images/9.%20pojazdy.png" alt="">
                        <?php endif;?>
                        <?php if($page === 'drivers'): ?>
                            <img width="150" height="150" src="../../public/images/7.%20kierowca.png" alt="">
                        <?php endif;?>

                        <?php if($page === 'contractors'): ?>
                            <img width="150" height="150" src="../../public/images/11.%20kontrahenci.png" alt="">
                        <?php endif;?>

                        <?php if($page === 'chat'): ?>
                            <img width="150" height="150" src="../../public/images/12.%20czat.png" alt="">
                        <?php endif;?>

                        <?php if($page === 'routes'): ?>
                            <img width="150" height="150" src="../../public/images/8.%20trasy.png" alt="">
                        <?php endif;?>

                        <?php if($page === 'loads'): ?>
                            <img width="150" height="150" src="../../public/images/9.%20pojazdy.png" alt="">
                        <?php endif;?>

                        <?php if($page === 'addDriver'): ?>
                            <img width="150" height="150" src="../../public/images/7.%20kierowca.png" alt="">
                        <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>