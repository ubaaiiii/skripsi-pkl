$(document).ready(function() {
  $('.btn-tambah').click(function(){
      $('#large .modal-content').load(base_url+'/modal/siswa',function(){
          $('#large').modal({backdrop: 'static', keyboard: false});
      });
  });

  $('.table').DataTable( {
      language: {
        url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
      },
      dom: 'lfBrtip',
      buttons: [
          {
              extend: 'copyHtml5',
              exportOptions: {
                  columns: [ 0, ':visible' ]
              }
          },
          {
              extend: 'pdfHtml5',
              exportOptions: {
                  columns: ':visible'
              }
          },
          {
              text: 'JSON',
              action: function ( e, dt, button, config ) {
                  var data = dt.buttons.exportData();

                  $.fn.dataTable.fileSave(
                      new Blob( [ JSON.stringify( data ) ] ),
                      'Export.json'
                  );
              }
          },
          {
              extend: 'print',
              exportOptions: {
                  columns: ':visible'
              }
          }
      ]
  });
});
