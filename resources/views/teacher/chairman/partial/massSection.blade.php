<div class="col-lg-2 float-left" id="sectionGrouping">
    <div class="form-group mb-0 pb-0 mb-3">
        <form method="POST">
            @csrf
            <div class="input-group">
                <select class="form-select" id="massSectioning" name="sectioningNow"></select>
                <div class="input-group-append">
                    <button class="btn btn-primary btnmassSectioning" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>