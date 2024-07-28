<div class="modal" id="AddItem">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="TheTittle">Add New Item<h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="panel-body">
                <form class="formPegawai" method="POST" enctype="multipart/form-data" action="" >
                    <div class="modal-body">
                        <label for="Code" class="text-center">Code</label>
                        <input type="text" class="form-control" id="Code">
                        <br>
                        <label for="Nama" class="text-center">Nama</label>
                        <input type="text" class="form-control" id="Nama">
                        <br>
                        <label for="Price" class="text-center">Price</label>
                        <input type="number" class="form-control Number" id="Price" min=0 max=10000000 onkeyup="Change()" onchange="Change()" value=0>
                        <p id="format"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" onclick="AddBarang()">Add</button>
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector(".Number").addEventListener("keypress", function (evt) {
        if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
        {
            evt.preventDefault();
        }
        if($(".Number").val().length >= ($(".Number").attr('max').length) && $(".Number").val()>=$(".Number").attr('max'))
        {
            $(".Number").val($(".Number").attr('max'));
            evt.preventDefault();
        }
    });
    
    function Change()
    {
        const price=document.getElementById('Price').value;
            
        document.getElementById('format').innerHTML = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR"
        }).format(price);
    }
    document.onload=Change();

    

        
</script>