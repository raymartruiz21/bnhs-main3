<form id="holidayForm" autocomplete="off">@csrf
    {{-- <div class="modal fade" id="holidayModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="holidayModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content pb-0">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="holidayModalLabel">Holiday</h5>
                    <button type="button" class="close btnCancelHoliday" data-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none;">
                        <span aria-hidden="true" style="font-size: 20px;"><b>&times;</b></span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <input type="hidden" name="id">
                    <div class="form-group mb-3">
                        <label>Select date from</label>
                        <input class="form-control datepicker1" name="holi_date_from" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Select date to</label>
                        <input class="form-control datepicker2" name="holi_date_to">
                    </div>
                    <div class="form-group mb-3">
                        <label>Description</label>
                        <textarea class="form-control" data-height="80" name="description" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="mystatus">Status</label>
                        <select id="mystatus" class="form-control" name="status" required>
                            <option value="Enable">Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btnCancelHoliday" style="color: #fff;"><i class="fas fa-times icon"></i> Close</button>
                    <button type="submit" class="btn btn-primary btnSaveHoliday"><i class="fas fa-check icon"></i> Save</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Modal -->
    <div class="modal fade" id="holidayModal" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="holidayModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Holiday</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id">
                <div class="form-group mb-3">
                    <label>Select date from</label>
                    <input class="form-control datepicker1" name="holi_date_from" required>
                </div>
                <div class="form-group mb-3">
                    <label>Select date to</label>
                    <input class="form-control datepicker2" name="holi_date_to">
                </div>
                <div class="form-group mb-3">
                    <label>Description</label>
                    <textarea class="form-control" data-height="80" name="description" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="mystatus">Status</label>
                    <select id="mystatus" class="form-control" name="status" required>
                        <option value="Enable">Enable</option>
                        <option value="Disable">Disable</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btnCancelHoliday" style="color: #fff;"><i class="fas fa-times icon"></i> Close</button>
                <button type="submit" class="btn btn-primary btnSaveHoliday"><i class="fas fa-check icon"></i> Save</button>
            </div>
        </div>
        </div>
    </div>
</form>