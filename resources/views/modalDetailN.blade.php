<div class="modal" id="modalDetailN">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="TheTittle">Detail Nota<h4>
                <button type="button" class="close tutup" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="panel-body">
                <form class="formPegawai" method="POST" enctype="multipart/form-data" action="" >
                    <div class="modal-body">
                        <div>
                            <label class="mr-2">No Nota:</label><label id="tanggal">2024-7</label><label>/</label><label id="nomor">1</label>
                        </div>
                        <div id="ListBarangN">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-row align-items-center">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <p>Grand Total:</p>
                            </div>
                            <div class="col-md-3">
                                <p id="MGT">0</p>
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <p>Amount Paid:</p>
                            </div>
                            <div class="col-md-3">
                                <p id="AP">0</p>
                            </div>
                        </div>
                        <div class="form-row align-items-center">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <p>Change:</p>
                            </div>
                            <div class="col-md-3">
                                <p id="Change">0</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" id="HPrint" onclick=print()>Print</button>
                        <button type="button" class="btn btn-sm btn-default tutup" data-dismiss="modal" onclick=close()>Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function print()
    {
        const result=document.getElementById('nomor').innerHTML;
        document.getElementById('printn').src = '{{url("PrintNota")}}'+'/'+result+'/'+exNama+'/'+exAddress+'/'+exPhone;
    }
</script>