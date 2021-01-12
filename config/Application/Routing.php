<?php
    namespace Config\Application;

	 	/**
     * Klasa konfiguracyjna przyjaznych adresów
   	 */
    final class Routing {
        public static $routes = [
          ['GET','/', array('controller' => 'Zawodnik', 'action' => 'showAll'), 'home'],

          //konfiguracja zawodnika
          ['GET','/zawodnik/?', array('controller' => 'Zawodnik', 'action' => 'showAll'), 'zawodnik'],
          ['GET','/zawodnik/[i:id]/?', array('controller' => 'Zawodnik', 'action' => 'showOne'), 'zawodnik_showOne'],
          ['GET','/zawodnik/statystyki/[i:id]/?', array('controller' => 'Zawodnik', 'action' => 'showStatistics'), 'zawodnik_showStatistics'],
          ['POST','/zawodnik/usun/[i:id]/?', array('controller' => 'Zawodnik', 'action' => 'delete'), 'zawodnik_delete'],
          ['GET','/zawodnik/formularz/?', array('controller' => 'Zawodnik', 'action' => 'ajaxAddForm'), 'zawodnik_form'],
          ['POST','/zawodnik/dodaj/?', array('controller' => 'Zawodnik', 'action' => 'insert'), 'zawodnik_insert'],
          ['GET','/zawodnik/mod/[i:id]/?', array('controller' => 'Zawodnik', 'action' => 'ajaxEditForm'), 'zawodnik_updOne'],
          ['POST','/zawodnik/modyfikuj/?', array('controller' => 'Zawodnik', 'action' => 'update'), 'zawodnik_update'],

          //konfiguracja stadionów
          ['GET','/stadion/?', array('controller' => 'Stadion', 'action' => 'showAll'), 'stadion'],
          ['GET','/stadion/[i:id]/?', array('controller' => 'Stadion', 'action' => 'showOne'), 'stadion_showOne'],
          ['POST','/stadion/usun/[i:id]/?', array('controller' => 'Stadion', 'action' => 'delete'), 'stadion_delete'],
          ['GET','/stadion/formularz/?', array('controller' => 'Stadion', 'action' => 'ajaxAddForm'), 'stadion_form'],
          ['POST','/stadion/dodaj/?', array('controller' => 'Stadion', 'action' => 'insert'), 'stadion_insert'],
          ['GET','/stadion/mod/[i:id]/?', array('controller' => 'Stadion', 'action' => 'ajaxEditForm'), 'stadion_updOne'],
          ['POST','/stadion/modyfikuj/?', array('controller' => 'Stadion', 'action' => 'update'), 'stadion_update'],

          //konfiguracja sędziów
          ['GET','/sedzia/?', array('controller' => 'Sedzia', 'action' => 'showAll'), 'sedzia'],
          ['GET','/sedzia/[i:id]/?', array('controller' => 'Sedzia', 'action' => 'showOne'), 'sedzia_showOne'],
          ['POST','/sedzia/usun/[i:id]/?', array('controller' => 'Sedzia', 'action' => 'delete'), 'sedzia_delete'],
          ['GET','/sedzia/formularz/?', array('controller' => 'Sedzia', 'action' => 'ajaxAddForm'), 'sedzia_form'],
          ['POST','/sedzia/dodaj/?', array('controller' => 'Sedzia', 'action' => 'insert'), 'sedzia_insert'],
          ['GET','/sedzia/mod/[i:id]/?', array('controller' => 'Sedzia', 'action' => 'ajaxEditForm'), 'sedzia_updOne'],
          ['POST','/sedzia/modyfikuj/?', array('controller' => 'Sedzia', 'action' => 'update'), 'sedzia_update'],

          //konfiguracja sezonów
          ['GET','/sezon/?', array('controller' => 'Sezon', 'action' => 'showAll'), 'sezon'],
          ['POST','/sezon/usun/[i:id]/?', array('controller' => 'Sezon', 'action' => 'delete'), 'sezon_delete'],
          ['GET','/sezon/formularz/?', array('controller' => 'Sezon', 'action' => 'ajaxAddForm'), 'sezon_form'],
          ['POST','/sezon/dodaj/?', array('controller' => 'Sezon', 'action' => 'insert'), 'sezon_insert'],
          ['GET','/sezon/mod/[i:id]/?', array('controller' => 'Sezon', 'action' => 'ajaxEditForm'), 'sezon_updOne'],
          ['POST','/sezon/modyfikuj/?', array('controller' => 'Sezon', 'action' => 'update'), 'sezon_update'],

          //konfiguracja trenerów
          ['GET','/trener/?', array('controller' => 'Trener', 'action' => 'showAll'), 'trener'],
          ['GET','/trener/[i:id]/?', array('controller' => 'Trener', 'action' => 'showOne'), 'trener_showOne'],
          ['POST','/trener/usun/[i:id]/?', array('controller' => 'Trener', 'action' => 'delete'), 'trener_delete'],
          ['GET','/trener/formularz/?', array('controller' => 'Trener', 'action' => 'ajaxAddForm'), 'trener_form'],
          ['POST','/trener/dodaj/?', array('controller' => 'Trener', 'action' => 'insert'), 'trener_insert'],
          ['GET','/trener/mod/[i:id]/?', array('controller' => 'Trener', 'action' => 'ajaxEditForm'), 'trener_updOne'],
          ['POST','/trener/modyfikuj/?', array('controller' => 'Trener', 'action' => 'update'), 'trener_update'],

          //konfiguracja klubów
          ['GET','/klub/?', array('controller' => 'Klub', 'action' => 'showAll'), 'klub'],
          ['GET','/klub/[i:id]/?', array('controller' => 'Klub', 'action' => 'showOne'), 'klub_showOne'],
          ['POST','/klub/usun/[i:id]/?', array('controller' => 'Klub', 'action' => 'delete'), 'klub_delete'],
          ['GET','/klub/formularz/?', array('controller' => 'Klub', 'action' => 'ajaxAddForm'), 'klub_form'],
          ['POST','/klub/dodaj/?', array('controller' => 'Klub', 'action' => 'insert'), 'klub_insert'],
          ['GET','/klub/mod/[i:id]/?', array('controller' => 'Klub', 'action' => 'ajaxEditForm'), 'klub_updOne'],
          ['POST','/klub/modyfikuj/?', array('controller' => 'Klub', 'action' => 'update'), 'klub_update'],

          //konfiguracja meczy
          ['GET','/mecz/?', array('controller' => 'Mecz', 'action' => 'showAll'), 'mecz'],
          ['GET','/mecz/[i:id]/?', array('controller' => 'Mecz', 'action' => 'showOne'), 'mecz_showOne'],
          ['GET','/mecz/sezon/[i:id]/?', array('controller' => 'Mecz', 'action' => 'showCat'), 'mecz_showCat'],
          ['GET','/mecz/tabela/[i:id]/?', array('controller' => 'Mecz', 'action' => 'showLeagueTable'), 'mecz_showLeagueTable'],
          ['POST','/mecz/usun/[i:id]/?', array('controller' => 'Mecz', 'action' => 'delete'), 'mecz_delete'],
          ['GET','/mecz/formularz/?', array('controller' => 'Mecz', 'action' => 'ajaxAddForm'), 'mecz_form'],
          ['POST','/mecz/dodaj/?', array('controller' => 'Mecz', 'action' => 'insert'), 'mecz_insert'],
          ['GET','/mecz/mod/[i:id]/?', array('controller' => 'Mecz', 'action' => 'ajaxEditForm'), 'mecz_updOne'],
          ['POST','/mecz/modyfikuj/?', array('controller' => 'Mecz', 'action' => 'update'), 'mecz_update'],

          //konfiguracja zawodnikmecz
          ['GET','/zawodnikmecz/?', array('controller' => 'ZawodnikMecz', 'action' => 'showAll'), 'zawodnikmecz'],
          ['GET','/zawodnikmecz/[i:id]/?', array('controller' => 'ZawodnikMecz', 'action' => 'showOne'), 'zawodnikmecz_showOne'],
          ['POST','/zawodnikmecz/usun/[i:id]/?', array('controller' => 'ZawodnikMecz', 'action' => 'delete'), 'zawodnikmecz_delete'],
          ['GET','/zawodnikmecz/formularz/?', array('controller' => 'ZawodnikMecz', 'action' => 'ajaxAddForm'), 'zawodnikmecz_form'],
          ['POST','/zawodnikmecz/dodaj/?', array('controller' => 'ZawodnikMecz', 'action' => 'insert'), 'zawodnikmecz_insert'],
          ['GET','/zawodnikmecz/mod/[i:id]/?', array('controller' => 'ZawodnikMecz', 'action' => 'ajaxEditForm'), 'zawodnikmecz_updOne'],
          ['POST','/zawodnikmecz/modyfikuj/?', array('controller' => 'ZawodnikMecz', 'action' => 'update'), 'zawodnikmecz_update'],

          //konfiguracja logowania
          ['GET','/formularz-logowania/?', array('controller' => 'Access', 'action' => 'logForm'), 'login_form'],
          ['POST','/zaloguj/?', array('controller' => 'Access', 'action' => 'login'), 'login'],
          ['GET','/formularz-rejestracji/?', array('controller' => 'Access', 'action' => 'regForm'), 'register_form'],
          ['GET','/user/mod/[i:id]/?', array('controller' => 'Access', 'action' => 'editUser'), 'user_updOne'],
          ['POST','/user/modyfikuj/?', array('controller' => 'Access', 'action' => 'update'), 'user_update'],
          ['GET','/user/zmien-haslo/[i:id]/?', array('controller' => 'Access', 'action' => 'editPassword'), 'editpassword_updOne'],
          ['POST','/user/zmien-haslo/?', array('controller' => 'Access', 'action' => 'updatePassword'), 'password_update'],
          ['POST','/zarejestruj/?', array('controller' => 'Access', 'action' => 'register'), 'register'],
          ['GET','/wyloguj/?', array('controller' => 'Access', 'action' => 'logout'), 'logout']
        ];
    }