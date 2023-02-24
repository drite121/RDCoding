$(function () {
    $('.AddNota').on('click', function (e) {
      e.preventDefault();
      $('#AddNota').modal({ backdrop: 'static', keyboard: false })
    });
  });

  $(function () {
    $('.EditNota').on('click', function (e) {
      e.preventDefault();
      $('#EditNota').modal({ backdrop: 'static', keyboard: false })
    });
  });

  $(function () {
    $('.AddService').on('click', function (e) {
      e.preventDefault();
      $('#AddService').modal({ backdrop: 'static', keyboard: false })
    });
  });
