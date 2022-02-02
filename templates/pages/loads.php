<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <div class="pd-20">
                <h4 class="text-blue h4">Tabela zawierające rodzaje ładunków</h4>
            </div>
        </div>
        <div class="pull-right">
            <a href="?action=addLoads" class="btn btn-primary btn-sm" role="button">
                Dodaj nowy ładunek
            </a>
        </div>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
            <tr>
                <th class="table-plus datatable-nosort">Nazwa</th>
                <th class="datatable-nosort">Akcja</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($params as $param): ?>
            <?php if(!empty($param['loads'])): ?>
                <?php foreach ($param['loads'] as $load): ?>
                    <tr>
                        <td class="table-plus"><?= $load['name']?></td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="?action=loads&id=<?= $load['id']?>"><i class="dw dw-delete-3"></i> Usuń</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>