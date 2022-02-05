
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <div class="pd-20">
                <h4 class="text-blue h4">Tabela zawierające kierowców</h4>
            </div>
        </div>
        <div class="pull-right">
            <div class="pd-20">
                <a href="?action=addDriver" class="btn btn-primary btn-sm" role="button">
                    Dodaj nowego kierowce
                </a>
            </div>
        </div>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
            <tr>
                <th class="table-plus">lp.</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Marka auta</th>
                <th>Model auta</th>
                <th>Rejestracja</th>
                <th class="datatable-nosort">Akcja</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach ($params['drivers'] as $driver): ?>
                <tr>
                    <td class="table-plus"><?= $i++?></td>
                    <td><?= $driver['firstname']?></td>
                    <td><?= $driver['lastname']?></td>
                    <td><?= $driver['brand']?></td>
                    <td><?= $driver['model']?></td>
                    <td><?= $driver['registery']?></td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="?action=editDriver&id=<?= $driver['id']?>"><i class="dw dw-edit2"></i> Edytuj</a>
                                <a class="dropdown-item" href="?action=drivers&id=<?= $driver['id']?>"><i class="dw dw-delete-3"></i> Usuń</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>