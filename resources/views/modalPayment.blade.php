<div class="modal" id="modalPayment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="TheTittle">Payment<h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="panel-body">
                <form class="formPegawai" method="POST" enctype="multipart/form-data" action="" >
                    <div class="modal-body">
                        <label>Enter Payment</label>
                        <input type="number" class="form-control Number" min=0 id="bayar">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" onclick="Finish()">Finish</button>
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>