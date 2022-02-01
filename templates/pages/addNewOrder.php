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
                <input class="form-control" name="date_start" type="date">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Oczekiwany czas ukończenia</label>
            <div class="col-sm-12 col-md-10">
                <input class="form-control" name="date_end" type="date">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Miejsce odbioru</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12">
                    <option selected>Wybierz miejsce odbioru</option>
                    <?php //todo: miejsca odbioru?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Miejsce rozładunku</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12">
                    <option selected>Wybierz miejsce rozładunku</option>
                    <?php //todo: miejsca rozładunku?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Rodzaj ładunku</label>
            <div class="col-sm-12 col-md-10">
                <select class="custom-select col-12">
                    <option selected>Wybierz ładunek</option>
                    <?php //todo: miejsca rozładunku?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Utwórz zlecenie</button>
    </form>
</div>
