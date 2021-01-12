/**
 * Plik ustawień aplikacji po stronie klienta
 */

// adres serwera aplikacji
let hostname = window.location.origin + '/';
// nazwa podkatalogu
let subdir = window.location.pathname.substr(1).substr(0, window.location.pathname.substr(1).indexOf('/')) + '/';


// aktywacja podpowiedzi Tooltip
$("body").tooltip({ selector: '[data-toggle=tooltip]' });
