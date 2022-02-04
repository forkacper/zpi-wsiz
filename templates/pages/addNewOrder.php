<div class="pd-20 card-box mb-30">
    <form method="POST">
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Numer zlecenia</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="order_number" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Czas rozpoczęcia realizacji</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="order_date_start" type="date">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Oczekiwany czas ukończenia</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="order_date_end" type="date">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Miejsce odbioru</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="order_place">
                    <option selected value="">Wybierz miejsce odbioru</option>
                    <?php foreach ($params['routes'] as $route):?>
                        <option value="<?= $route['id']?>">
                            <?= $route['country'] . ', ' . $route['city'] . ', ' . $route['postcode'] . ' ul. ' . $route['street'] . ' ' . $route['number']?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Miejsce rozładunku</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="order_unloading">
                    <option selected value="">Wybierz miejsce rozładunku</option>
                    <?php foreach ($params['routes'] as $route):?>
                        <option value="<?= $route['id']?>">
                            <?= $route['country'] . ', ' . $route['city'] . ', ' . $route['postcode'] . ' ul. ' . $route['street'] . ' ' . $route['number']?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Rodzaj ładunku</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12" name="order_load">
                    <option selected value="">Wybierz ładunek</option>
                    <?php foreach ($params['loads'] as $route):?>
                        <option value="<?= $route['id']?>">
                            <?= $route['name']?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Utwórz zlecenie</button>
    </form>
</div>
