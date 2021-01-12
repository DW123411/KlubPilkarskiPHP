//rozszerzenie domyślnej konfiguracji DataTables
let extraDatatableOptions = {
    columnDefs: [{
        targets: -1,
        orderable: false
    }]
}

$(document).ready(function() {
  if(typeof jQuery().deleteConfirm !== "undefined")
      $(".delete-button").deleteConfirm();

  if(typeof jQuery().loadModal !== "undefined")
    $('.add-button').loadModal();
});
