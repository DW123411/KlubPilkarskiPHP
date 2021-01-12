/**
 * Aktywacja i dostosowanie komponentu DataTables
 */
//Zmienna datatable
let datatable;

//Domyślna konfiguracja pluginu
let defaultOptions = {
    pageLength: 10,
    dom: 'Bfrtipl',
    buttons: [
        {
          extend: 'pdfHtml5',
          orientation: 'landscape',
          exportOptions: {
              columns: ':visible(:not(:last-child)'
          }
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
              columns: ':visible(:not(:last-child)'
          }
        },
        {
          extend: 'print',
          exportOptions: {
              columns: ':visible(:not(:last-child)'
          }
        }
    ],
    language: {
        "processing":     "Przetwarzanie...",
        "search":         "Szukaj:",
        "lengthMenu":     "Pokaż _MENU_ pozycji",
        "info":           "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
        "infoEmpty":      "Pozycji 0 z 0 dostępnych",
        "infoFiltered":   "(filtrowanie spośród _MAX_ dostępnych pozycji)",
        "infoPostFix":    "",
        "loadingRecords": "Wczytywanie...",
        "zeroRecords":    "Nie znaleziono pasujących pozycji",
        "emptyTable":     "Brak danych",
        "paginate": {
            "first":      "Pierwsza",
            "previous":   "Poprzednia",
            "next":       "Następna",
            "last":       "Ostatnia"
        },
        "aria": {
            "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
            "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
        }
    },
    initComplete: function(settings){
      if($('#form-datatable').hasClass('checkable')) {
             var api = this.api();
             api.cells(
                api.rows(function(idx, data, node){
                   return $(node).hasClass("noSelectable");
                }).indexes(),
                0
             ).checkboxes.disable();
          }
      }
};

$(document).ready(function() {
    //sprawdzenie czy wtyczka została załadowana
    if(typeof jQuery().DataTable !== "undefined") {
      //wtyczka bez checkboxów
      let isCheckable = $('#form-datatable').hasClass('checkable');
      if(!isCheckable) {
        //dodanie pól wszyukiwania input dla kolumn z klasą "searchable"
        $('#datatable tfoot th.searchable').each(function () {
            let title = $(this).text();
            $(this).html( '<input type="text" placeholder="'+title+'" />' );
        });
      } else { //wtyczka z checkboxami
          $('#form-datatable').submit(function(event) { //formularz datatables
              //akcja formularza confirmdelete ma być taka jak formularza datatables
              $('#delete-confirm-modal-form').attr('action', $('#form-datatable').attr('action'));
              let rows_selected = datatable.column(0).checkboxes.selected();
              $('#delete-confirm-modal .modal-body').html('Czy usunąć zaznaczone elementy w ilości: ' + rows_selected.length + '?');
              $('#delete-confirm-modal').modal('show');
              $('#delete-confirm-modal-form').submit(function(event){
                  //potwierdzenie usunięcia
                  let form = this;
                  $.each(rows_selected, function(index, rowId){
                    // Tworzymy tymczasowe ukryte inputy
                    $(form).append(
                        $('<input>')
                           .attr('type', 'hidden')
                           .attr('name', 'id[]')
                           .val(rowId)
                    );
                  });
             });
             event.preventDefault();
          });
      }
      //rozszerzenie konfiguracji pluginu o dodatkowe parametry zdefiniowane przez użytkownika
      if (typeof extraDatatableOptions !== 'undefined') {
          $.extend(defaultOptions, extraDatatableOptions);
      }
      //aktywacja wtyczki
      datatable = $('#datatable').DataTable(defaultOptions);
      if(!isCheckable) {
        //aktywacja wyszukiwania po kolumnach
        datatable.columns().every(function() {
            let that = this;
            $('input', this.footer()).on('keyup change', function () {
                if(that.search() !== this.value) {
                    that.search( this.value )
                        .draw();
                }
            });
        });
      }
    }
});
