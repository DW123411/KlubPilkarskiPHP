(function ( $ ) {

    $.fn.customize = function( options ) {

        // rozszerzenie domyślnych wartości
        var settings = $.extend({
            // domyślne wartości
            color: "#fff",
            backgroundColor: "#ff0000"
        }, options );

        // zastosowanie stylu CSS do wybranego elementu
        return this.css({
            color: settings.color,
            backgroundColor: settings.backgroundColor
        });

    };

}( jQuery ));
