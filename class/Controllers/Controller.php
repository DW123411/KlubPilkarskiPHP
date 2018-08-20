<?php
	namespace Controllers;

  /**
   * abstrakcyjna klasa kontrolera
   */
	abstract class Controller {
		/**
     * funkcja przekierowywująca akcję na inną
     * @param  string $url adres przekierowania
     */
		public function redirect($url) {
			if(preg_match('/^http:/', $url) === 1)
				header('location: '.$url);
			else
				header('location: '.\Config\Application\Config::$protocol.$_SERVER["SERVER_NAME"].'/'.\Config\Application\Config::$subdir.$url);
      exit(0);
		}
  }
