<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <div class="pd-20">
                <h4 class="text-blue h4">Tabela zawierające rodzaje tras przewozowych</h4>
            </div>
        </div>
        <div class="pull-right">
            <a href="?action=addRoutes" class="btn btn-primary btn-sm" role="button">
                Dodaj nową trasę
            </a>
        </div>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
            <tr>
                <th class="table-plus datatable">Kraj</th>
                <th class="table-plus datatable">Miasto</th>
                <th class="table-plus datatable">Kod pocztowy</th>
                <th class="table-plus datatable">Ulica</th>
                <th class="table-plus datatable">Numer</th>
                <th class="datatable-nosort">Akcja</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($params as $param): ?>
                <?php if(!empty($param['routes'])): ?>
                    <?php foreach ($param['routes'] as $route): ?>
                        <tr>
                            <td class="table-plus"><?= $route['country']?></td>
                            <td class="table-plus"><?= $route['city']?></td>
                            <td class="table-plus"><?= $route['postcode']?></td>
                            <td class="table-plus"><?= $route['street']?></td>
                            <td class="table-plus"><?= $route['number']?></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="?action=routes&id=<?= $route['id']?>"><i class="dw dw-delete-3"></i> Usuń</a>
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