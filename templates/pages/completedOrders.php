
<!-- Simple Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">Tabela zawierające zakończone zlecenia</h4>
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
                <th colspan="datatable-nosort">Adres odbioru</th>
                <th>Adres docelowy</th>
                <th>Kierowca</th>
                <th>Pojazd</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach ($params['orders'] as $order): ?>
                <tr>
                    <td class="table-plus"><?= $i++?></td>
                    <td><?= $order['order_number']?></td>
                    <td><?= $order['date_start']?></td>
                    <td><?= $order['date_end']?></td>
                    <td><?= $order['loads_name']?></td>
                    <td><?= $order['place_country'] . ' ' .$order['place_city'] . ' ' . $order['place_postcode'] . ' ' .$order['place_street'] . ' ' .$order['place_number']?></td>
                    <td><?= $order['unloading_country'] . ' ' . $order['unloading_city'] . ' ' . $order['unloading_postcode'] . ' ' . $order['unloading_street'] . ' ' . $order['unloading_number']?></td>
                    <td><?= $order['driver_first_name'] . ' ' . $order['driver_last_name']?></td>
                    <td><?= 'Rejestracja: ' . $order['car_plate'] . ' – Ciężarówka: ' . $order['car_brand'] . ' – ' . $order['car_model']?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>