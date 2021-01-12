//rozszerzenie domyślnej konfiguracji DataTables
let extraDatatableOptions = {
  order: [[ 1, 'asc' ]],
  columnDefs: [
          {
            "targets": -1,
            "orderable": false
          },
          {
             "targets": 0,
             "orderable": false,
             "checkboxes": {
                "selectRow": true
             }
          }
    ]
};

$(document).ready(function() {
  if(typeof jQuery().deleteConfirm !== "undefined")
    $(".delete-button").deleteConfirm();

  if(typeof jQuery().loadModal !== "undefined") {
    $('.add-button').loadModal();
    $('.edit-button').loadModal();
  }




});
