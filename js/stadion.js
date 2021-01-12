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
    	$('.edit-button').loadModal();

    $('#modal-form').validate({

        rules: {

			miejscowosc: {

        		required: true,
				minlength: 2,
				maxlength: 90
          	},
      		nazwa: {

        		required: true,
        		minlength: 2,
        		maxlength: 70
          	},
          	pojemnosc: {

          		required: true,
          		number: true
          	}
        },

		messages: {
			miejscowosc: {
				required: 'Pole wymagane',
				minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaków!")
			},
      		nazwa: {
				required: 'Pole wymagane',
				minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaków!")
			},
			pojemnosc: {
				required: 'Pole wymagane',
				number: 'Pole musi zawierać tylko cyfry!'
			}

    	},

        highlight: function(element, errorClass, validClass) {
            //znajdz najbliższy element form-group
            $(element).closest('.form-group').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).closest('.form-group').removeClass(errorClass).addClass(validClass);
        },
        errorClass: 'has-error',
		validClass: 'has-success',

		invalidHandler: function(event, validator) {

			var errors = validator.numberOfInvalids();
			if (errors) {
			  var message = errors == 1
				? 'Nie wypełniono poprawnie 1 pola. Zostało podświetlone'
				: 'Nie wypełniono poprawnie ' + errors + ' pól. Zostały podświetlone';
			  $("div.alert-danger").html(message);
			  $("div.alert-danger").show();
			} else {
			  $("div.alert-danger").hide();
			}
		},
	});
});
