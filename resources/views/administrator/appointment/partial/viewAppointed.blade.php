<!-- Modal -->
<div class="modal fade" id="appointedModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="appointedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="appointedModalLabel">Modal title</h5>
                <button type="button" class="close btnCancelHoliday" data-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none;">
                    <span aria-hidden="true" style="font-size: 20px;"><b>&times;</b></span>
                </button>
            </div>
            <div class="modal-body">
               <div class="table-responsive">
                <div class="float-left mb-3">
                    <button type="button" class="btn btn-icon icon-left btn-info mr-3 text-white" id="printAppointed">
                        <i class="fas fa-print"></i> Print List
                    </button>
                </div>
                <table class="table table-hover table-ordered" id="appointedTable" style="font-size: 14px">
                    <thead>
                        <tr>
                            <th width="13%">Transaction No.</th>
                            <th width="15%">Name</th>
                            <th width="15%">Contact</th>
                            <th width="10%">Email</th>
                            <th width="25%">Address</th>
                            <th>Purpose</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
               </div>
            </div>
        </div>
    </div>
</div>

