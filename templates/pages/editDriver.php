<div class="pd-20 card-box mb-30">
    <form method="POST">
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Imię</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="<?= $params['driver'][0][0]['firstname']?>" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nazwisko</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" value="<?= $params['driver'][0][0]['lastname']?>" disabled>
            </div>
        </div>
        <?php if(!empty($params['driver'][0][0]['car_id'])): ?>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Ciężarówka</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="driver_car">
                    <option selected value="<?= $params['driver'][0][0]['car_id']?>">
                        <?= $params['driver'][0][0]['brand'] . ' ' . $params['driver'][0][0]['model'] . ' ' . $params['driver'][0][0]['plate']?>
                    </option>
                    <?php foreach ($params['driver'][1] as $car): ?>
                        <option value="<?= $car['id']?>">
                            <?= $car['brand'] . ' ' . $car['model'] . ' ' . $car['plate']?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <?php else: ?>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Ciężarówka</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12" name="driver_car">
                        <option selected>Wybierz auto...</option>
                        <?php foreach ($params['driver'][1] as $car): ?>
                            <option value="<?= $car['id']?>">
                                <?= $car['brand'] . ' ' . $car['model'] . ' ' . $car['plate']?>
                            </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        <?php endif;?>
        <button type="submit" class="btn btn-primary">Edytuj kierowce</button>
    </form>
</div>
