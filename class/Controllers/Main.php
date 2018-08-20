<?php
  namespace Controllers;

  /**
   * Główny kontroler aplikacji
   */
  final class Main extends Controller {
    public function __construct() {
        try {
          d('Witaj Świecie!');
        } catch(\Exception $e) {
          $this->redirect('404.html');
        }
    }
  }
