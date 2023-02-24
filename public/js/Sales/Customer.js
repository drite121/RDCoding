$(function () {
    $('.DetailCustomer').on('click', function (e) {
        e.preventDefault();
        $('#modalCustomer').modal({ backdrop: 'static', keyboard: false })
        document.getElementById("HeadDetailCustomer").innerHTML = "Detail Customer.  " + $(this).data('id');
        $.ajax({
            url: window.location.origin + "/Customer/" + $(this).data('id') + "/show",
            type: 'get',
            data: '_token = <?php echo csrf_token() ?>', // Remember that you need to have your csrf token included
            success: function (data) {
                document.getElementById("DetailCustomer").innerHTML = "ID Customer: " + data.data.IDCust
                + "</br>Jenis Customer: " + data.data.JnsCust + " - " + data.data.NamaJnsCust + "</br>Nama Customer: "
                + data.data.NamaCust + "</br>Initial Customer: " + data.data.KodeCust  + "</br>Contact Person: "
                + data.data.ContactPerson  + "</br>Limit Pembelian: " + data.data.LimitPembelian + "</br>Alamat: "
                + data.data.Alamat + "</br>Kode Pos: " + data.data.KodePos + "</br>Kota: " + data.data.Kota
                + "</br>Provinsi: " + data.data.Propinsi + "</br>Negara: " + data.data.Negara + "</br>No. Telpon 1: "
                + data.data.NoTelp1 + "</br>No. Telpon 2: " + data.data.NoTelp2 + "</br>No Telex: " + data.data.NoTelex
                + "</br>No. Fax 1: " + data.data.NoFax1 + "</br>No. Fax 2: " + data.data.NoFax2 + "</br>Email: "
                + data.data.Email + "</br>Alamat Kirim: " + data.data.AlamatKirim + "</br>Kota Kirim: "
                + data.data.KotaKirim + "</br><hr></br>No.NPWP: " + data.data.NPWP + "</br>Nama di NPWP: "
                + data.data.NamaNPWP + "</br>Alamat di NPWP: " + data.data.AlamatNPWP
                + "</br><hr></br>Tanggal data diinputkan: " + data.data.TimeInput;
                console.log('yay');
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
    });
});

function OpenWindows(url) {
    window.open(url, 'window name', "width=800, height=600");
}

// $(function () {
//   $('.Detail').on('click', function (e) {
//     e.preventDefault();
//     $('#modalDetail').modal({ backdrop: 'static', keyboard: false })
//   });
// });

// $('.DetailCustomer').on('click', function(e){
//     e.preventDefault();
//     var idcust = $(this).data('id');
//     $.ajax({
//         url: "{{ url('Sales/Master/Customer/getDetail') }}/" + idcust,
//         method: "GET",
//         dataType: "json",
//         success: function(data){
//             $('#NamaCustomer').text(data.NamaCust);
//         }
//     });
//     $('#modalCustomer').modal('show');
// });


// $('#modal-customer').on('show.bs.modal', function (e) {
//     var idcust = $(e.relatedTarget).data('id');
//     // fetch data based on idcust
// });

