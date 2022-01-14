<?php
if(!empty($params['error'])):
   foreach ($params as $param): ?>

       <div class="alert alert-warning alert-dismissible fade show" role="alert" style="$">
           <strong>Uwaga!</strong> <?= $param ?>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
           </button>
       </div>

<?php
   endforeach; endif;

if(!empty($params['success'])):
    foreach ($params as $param): ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukces</strong> <?= $param ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

<?php endforeach;endif; ?>