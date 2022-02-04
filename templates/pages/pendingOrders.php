
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Tabela zawierające oczekujące zlecenia</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                        <tr>
                            <th class="table-plus">lp.</th>
                            <th>Numer zlecenia</th>
                            <th>Data odbioru</th>
                            <th>Data oczekiwanej realizacji</th>
                            <th>Rodzaj przesyłki</th>
                            <th class="datatable-nosort">Akcja</th>
                            <th>Adres odbioru</th>
                            <th>Adres docelowy</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; foreach ($params['orders'] as $order): ?>
                        <?php if($params['user']['userRole'] === 'kontrahent' && $params['user']['userId'] != $order['order_user_id']) continue;?>
                        <tr>
                            <td class="table-plus"><?= $i++?></td>
                            <td><?= $order['order_number']?></td>
                            <td><?= $order['date_start']?></td>
                            <td><?= $order['date_end']?></td>
                            <td><?= $order['loads_name']?></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <?php if($params['user']['userRole'] !== 'kontrahent'): ?>
                                        <a class="dropdown-item" href="?action=editOrder&id=<?= $order['order_id']?>"><i class="dw dw-edit2"></i> Edytuj</a>
                                        <?php endif;?>
                                        <a class="dropdown-item" href="?action=pendingOrders&id=<?= $order['order_id']?>"><i class="dw dw-delete-3"></i> Usuń</a>
                                    </div>
                                </div>
                            </td>
                            <td><?= $order['place_country'] . ' ' .$order['place_city'] . ' ' . $order['place_postcode'] . ' ' .$order['place_street'] . ' ' .$order['place_number']?></td>
                            <td><?= $order['unloading_country'] . ' ' .$order['unloading_city'] . ' ' . $order['unloading_postcode'] . ' ' . $order['unloading_street'] . ' ' . $order['unloading_number']?></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>