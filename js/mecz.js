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

	$.validator.addMethod('data', function (value, element) {
  		return /\d{4}[\-]\d{2}[\-]\d{2}[\ ]\d{2}[\:]\d{2}/.test(value);
    }, 'Format: rrrr-mm-dd gg:mm');

    $('#modal-form').validate({

        rules: {

			ids: {

        		required: true
          	},
      		data: {

        		required: true,
        		maxlength: 16,
        		data: true
          	},
      		idstadion: {

        		required: true
          	},
      		idklubgospodarze: {

        		required: true
          	},
          	idklubgoscie: {

        		required: true
          	},
          	bramkigospodarze: {

          		required: true,
          		number: true
          	},
          	bramkigoscie: {

          		required: true,
          		number: true
          	},
          	punktygospodarze: {

          		required: true,
          		number: true
          	},
          	punktygoscie: {

          		required: true,
          		number: true
          	},
          	opis: {

          		maxlength: 150
          	},
          	idsedzia: {

          		required: true
          	},
          	kibice: {

          		required: true,
          		number: true
          	}
        },

		messages: {
			ids: {
				required: 'Pole wymagane'
			},
     		data: {
				required: 'Pole wymagane',
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaków!")
			},
      		idstadion: {
				required: 'Pole wymagane'
			},
      		idklubgospodarze: {
				required: 'Pole wymagane'
			},
			idklubgoscie: {
				required: 'Pole wymagane'
			},
			bramkigospodarze: {
				required: 'Pole wymagane',
				number: 'Pole musi zawierać tylko cyfry!'
			},
			bramkigoscie: {
				required: 'Pole wymagane',
				number: 'Pole musi zawierać tylko cyfry!'
			},
			punktygospodarze: {
				required: 'Pole wymagane',
				number: 'Pole musi zawierać tylko cyfry!'
			},
			punktygoscie: {
				required: 'Pole wymagane',
				number: 'Pole musi zawierać tylko cyfry!'
			},
			opis: {
				maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaków!")
			},
			idsedzia: {
				required: 'Pole wymagane'
			},
			kibice: {
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
