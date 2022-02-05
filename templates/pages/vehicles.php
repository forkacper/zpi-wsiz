
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <div class="pd-20">
                <h4 class="text-blue h4">Tabela zawierające informacje o pojazdach</h4>
            </div>
        </div>
        <div class="pull-right">
            <div class="pd-20">
                <a href="?action=addCar" class="btn btn-primary btn-sm" role="button">
                    Dodaj nowy pojazd
                </a>
            </div>
        </div>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
            <tr>
                <th class="table-plus">lp.</th>
                <th>Zdjęcie</th>
                <th>Marka</th>
                <th>Model</th>
                <th>Rejestracja</th>
                <th>Czy w drodze?</th>
                <th>Czy wolne?</th>
                <th class="datatable-nosort">Akcja</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach ($params['cars'] as $car): ?>
                <tr>
                    <td class="table-plus"><?= $i++?></td>
                    <td></td>
                    <td><?= $car['brand']?></td>
                    <td><?= $car['model']?></td>
                    <td><?= $car['plate']?></td>
                    <td><?php if($car['is_used']): ?>
                        <button type="button" class="btn btn-danger">Tak
                        <?php else:?>
                        <button type="button" class="btn btn-success">Nie
                        <?php endif;?>
                    </td>
                    <td><?php if(!$car['is_free']): ?>
                        <button type="button" class="btn btn-danger">Zajęte
                        <?php else:?>
                        <button type="button" class="btn btn-success">Wolne
                        <?php endif;?>
                    </td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
<!--                                <a class="dropdown-item" href="?action=editDriver&id=--><?//= $car['id']?><!--"><i class="dw dw-edit2"></i> Edytuj</a>-->
                                <a class="dropdown-item" href="?action=vehicles&id=<?= $car['id']?>"><i class="dw dw-delete-3"></i> Usuń</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>