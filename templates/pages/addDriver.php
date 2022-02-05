<div class="pd-20 card-box mb-30">
    <form method="POST">
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Imię</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="drivers_firstname" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nazwisko</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="drivers_lastname" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Login</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="drivers_login" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Hasło</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="drivers_password" type="password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Ciężarówka</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="drivers_car">
                    <option selected>Wybierz dostępną ciężarówkę...</option>
                    <?php foreach ($params['cars'] as $car): ?>
                        <option value="<?= $car['id']?>"><?= $car['brand'] . ' ' . $car['model'] . ' ' . $car['plate']?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Utwórz kierowce</button>
    </form>
</div>
