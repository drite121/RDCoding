$(function () {
    $('.AddJurnal').on('click', function (e) {
      e.preventDefault();
      $('#AddJurnal').modal({ backdrop: 'static', keyboard: false })
    });
  });

  $(function () {
    $('.EditJurnal').on('click', function (e) {
      e.preventDefault();
      console.log($(this).data('pelapor'));
      $("#EditTglLapor").val($(this).data('tgllapor'));
      $("#EditTglSelesai").val($(this).data('tglselesai'));
      $("#EditPelapor").val($(this).data('pelapor')).change();
      $("#EditKategori").val($(this).data('kategori'));
      $("#EditDetailMasalah").val($(this).data('detailpermasalahan'));
      $("#EditSolusi").val($(this).data('solusi'));

      var $url=$(this).attr('href');
      $(".formEditJurnal").attr('action',"");
      var action = $('.formEditJurnal').attr('action');
      $('.formEditJurnal').attr('action', action.replace("",""+$url+""));

      $('#EditJurnal').modal({ backdrop: 'static', keyboard: false })
    });
  });

  $(function () {
    $('.DelJurnal').on('click', function (e) {
      e.preventDefault();
       $("#DelTglLapor").html($(this).data('tgllapor'));
       $("#DelPelapor").html($(this).data('pelapor'));
       $("#DelKategori").html($(this).data('kategori'));
       var $url=$(this).attr('href');
      $('#DelJurnal').modal({ backdrop: 'static', keyboard: false })
          .on('click', '#delete-btn', function(){
              window.open($url, '_self');
          });
    });
  });

  $(function () {
    $('.DetailJurnal').on('click', function (e) {
      e.preventDefault();
      $.ajax({
        url: window.location.origin+"/Jurnal/"+$(this).data('id')+"/show",
        type: 'get',
        data: '_token = <?php echo csrf_token() ?>', // Remember that you need to have your csrf token included
        success: function( data ){
            document.getElementById("DetailTglLapor").innerHTML="Tgl. Lapor: "+data.data.Tgl_Lapor;
            document.getElementById("DetailTglSelesai").innerHTML="Tgl. Selesai: "+data.data.Tgl_Selesai;
            document.getElementById("DetailPelapor").innerHTML="Pelapor: "+data.data.NamaUser;
            document.getElementById("DetailKategori").innerHTML="Kategori: "+data.data.Kategori;
            document.getElementById("DetailDetailMasalah").innerHTML="Masalah: "+data.data.DetailPermasalahan;
            document.getElementById("DetailSolusi").innerHTML="Solusi: "+data.data.Solusi;
            console.log('yay');
        },
        error: function(xhr, status, error){
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
        }
    });

      $('#DetailJurnal').modal({ backdrop: 'static', keyboard: false })
    });
  });

  $(function () {
    $('.DetailJurnalMaster').on('click', function (e) {
      e.preventDefault();
      $.ajax({
        url: window.location.origin+"/Jurnal/"+$(this).data('id')+"/show",
        type: 'get',
        data: '_token = <?php echo csrf_token() ?>', // Remember that you need to have your csrf token included
        success: function( data ){
            document.getElementById("DetailTglLapor").innerHTML="Tgl. Lapor: "+data.data.Tgl_Lapor;
            document.getElementById("DetailTglSelesai").innerHTML="Tgl. Selesai: "+data.data.Tgl_Selesai;
            document.getElementById("DetailPelapor").innerHTML="Pelapor: "+data.data.NamaUser;
            document.getElementById("DetailKategori").innerHTML="Kategori: "+data.data.Kategori;
            document.getElementById("DetailDetailMasalah").innerHTML="Masalah: "+data.data.DetailPermasalahan;
            document.getElementById("DetailSolusi").innerHTML="Solusi: "+data.data.Solusi;
            $('.AddKelompok').attr('href', window.location.origin+"/Jurnal/"+data.data.IdJurnal+"/InputKelompok");
            console.log('yay');
        },
        error: function(xhr, status, error){
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
        }
    });

      $('#DetailJurnalMaster').modal({ backdrop: 'static', keyboard: false })
    });
  });


  $(function () {
    $('.InputKelompok').on('click', function (e) {
      e.preventDefault();

      var $url=$(this).attr('href');
      $(".formInputKelompok").attr('action',"");
      var action = $('.formInputKelompok').attr('action');
      $('.formInputKelompok').attr('action', action.replace("",""+$url+""));

      $("#DetailJurnalMaster").modal('hide');
      $('#AddInputKelompok').modal({ backdrop: 'static', keyboard: false })
    });
  });

  $(function () {
    $('.ListKelompok').on('click', function (e) {
      e.preventDefault();
      $('#ListKelompok').modal({ backdrop: 'static', keyboard: false })
    });
  });

  $(function () {
    $('.ListKategori').on('click', function (e) {
      e.preventDefault();
      $('#ListKategori').modal({ backdrop: 'static', keyboard: false })
    });
  });

  $(function () {
    $('.AddKelompok').on('click', function (e) {
      e.preventDefault();
      $("#ListKelompok").modal('hide');
      console.log('yay');
      $('#AddKelompok').modal({ backdrop: 'static', keyboard: false })
    });
  });

  $(function () {
    $('.AddKategori').on('click', function (e) {
      e.preventDefault();
      $("#ListKategori").modal('hide');
      console.log('yay');
      $('#AddKategori').modal({ backdrop: 'static', keyboard: false })
    });
  });

  $(function () {
    $('.EditKategori').on('click', function (e) {
      e.preventDefault();
      console.log('yay');
      $("#ListKategori").modal('hide');

      $("#EditKategori1").val($(this).data('kategori'));
      console.log($(this).data('kategori'));

      var $url=$(this).attr('href');
      $(".formEditKategori").attr('action',"");
      var action = $('.formEditKategori').attr('action');
      $('.formEditKategori').attr('action', action.replace("",""+$url+""));

      $('#EditKategori').modal({ backdrop: 'static', keyboard: false })
    });
  });
