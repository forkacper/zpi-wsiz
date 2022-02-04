<div class="pd-20 card-box mb-30">
    <form method="POST">
        <?php if(!empty($params['orders']['driver_first_name'])):?>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Status zlecenia</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="order_status">
                        <option selected value="<?= $params['statuses']['aktualny']['id']?>"><?= $params['statuses']['aktualny']['name']?></option>
                        <?php foreach ($params['statuses']['dostepne'] as $status): ?>
                            <option value="<?= $status['id']?>"><?= $status['name']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        <?php else: ?>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Przypisz kierowcę do zlecenia</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="order_driver">
                        <option selected>Wybierz kierowce..</option>
                        <?php foreach ($params['drivers'] as $driver): ?>
                            <option value="<?= $driver['id']?>"><?= 'Kierowca: ' . $driver['firstname'] . ' ' . $driver['lastname'] . ' – Ciężarówka: ' . $driver['brand'] . ' ' . $driver['model'] . ' ' . $driver['plate']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        <?php endif;?>
        <div class="form-group row" hidden>
            <label class="col-sm-12 col-md-2 col-form-label">ID zlecenia</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="order_number" type="text" value="<?= $params['orders']['order_id']?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Numer zlecenia</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="<?= $params['orders']['order_number']?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Data utworzenia</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="date" value="<?= $params['orders']['date_start']?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Data przewidywanego zakończenia</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="date" value="<?= $params['orders']['date_end']?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Rodzaj ładunku</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="<?= $params['orders']['loads_name']?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Miejsce załadunku</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="<?= $params['orders']['place_country'] . ' ' . $params['orders']['place_city'] . ' ' . $params['orders']['place_postcode'] . ' ' . $params['orders']['place_street'] . ' ' . $params['orders']['place_number']?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Miejsce rozładunku</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="<?= $params['orders']['unloading_country'] . ' ' . $params['orders']['unloading_city'] . ' ' . $params['orders']['unloading_postcode'] . ' ' . $params['orders']['unloading_street'] . ' ' . $params['orders']['unloading_number']?>" disabled>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Edytuj zlecenie</button>
    </form>
</div>
