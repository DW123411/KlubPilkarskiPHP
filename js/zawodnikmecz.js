//rozszerzenie domyślnej konfiguracji DataTables
let extraDatatableOptions = {
    columnDefs: [{
        targets: -1,
        orderable: false
    }]
}

$(document).ready(function() {

    $('#form').validate({

        rules: {

			      idm: {

        		  required: true
          	},
      		  idz: {

        		  required: true
          	},
      		  pozycja: {

        		  required: true,
              minlength: 1,
              maxlength: 3
          	},
      		  minutyod: {

        		  required: true,
              minlength: 1,
              maxlength: 3,
              number: true
          	},
          	minutydo: {

        		  required: true,
              minlength: 1,
              maxlength: 3,
              number: true
          	},
          	bramki: {

          		required: true,
              minlength: 1,
              maxlength: 2,
          		number: true
          	},
          	asysty: {

          		required: true,
              minlength: 1,
              maxlength: 2,
          		number: true
          	},
          	kartkizolte: {

          		required: true,
              minlength: 1,
              maxlength: 1,
          		number: true
          	},
          	kartkiczerwone: {

          		required: true,
              minlength: 1,
              maxlength: 1,
          		number: true
          	},
          	podaniaudane: {

          		required: true,
              minlength: 1,
              maxlength: 3,
              number: true
          	},
          	podanianieudane: {

          		required: true,
              minlength: 1,
              maxlength: 3,
              number: true
          	}
        },

		messages: {
			idm: {
				required: 'Pole wymagane'
			},
     	idz: {
				required: 'Pole wymagane'
			},
      pozycja: {
				required: 'Pole wymagane',
        minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
        maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
			},
      minutyod: {
				required: 'Pole wymagane',
        minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
        maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!"),
        number: 'Pole musi zawierać tylko cyfry!'
			},
			minutydo: {
				required: 'Pole wymagane',
        minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
        maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!"),
        number: 'Pole musi zawierać tylko cyfry!'
			},
			bramki: {
				required: 'Pole wymagane',
        minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
        maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!"),
				number: 'Pole musi zawierać tylko cyfry!'
			},
			asysty: {
				required: 'Pole wymagane',
        minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
        maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!"),
				number: 'Pole musi zawierać tylko cyfry!'
			},
			kartkizolte: {
				required: 'Pole wymagane',
        minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
        maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!"),
				number: 'Pole musi zawierać tylko cyfry!'
			},
			kartkiczerwone: {
				required: 'Pole wymagane',
        minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
        maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!"),
				number: 'Pole musi zawierać tylko cyfry!'
			},
			podaniaudane: {
				required: 'Pole wymagane',
        minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
        maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!"),
        number: 'Pole musi zawierać tylko cyfry!'
			},
			podanianieudane: {
				required: 'Pole wymagane',
        minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
        maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!"),
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

  if(typeof jQuery().deleteConfirm !== "undefined")
        $(".delete-button").deleteConfirm();

    if(typeof jQuery().loadModal !== "undefined")
      $('.add-button').loadModal();
      $('.edit-button').loadModal();
});
