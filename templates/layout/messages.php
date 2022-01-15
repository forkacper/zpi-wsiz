<?php

foreach ($params as $param):
    if(!empty($param['error'])): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="">
            <strong>Uwaga!</strong> <?= $param['error'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    <?php endif;
    if(!empty($param['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukces</strong> <?= $param['success'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    <?php endif; endforeach;?>