<?php
  namespace Controllers;

  /**
   * Główny kontroler aplikacji
   */
  final class Main extends Controller {
    public function __construct() {
        try {
          // Kontroler / akcja / parametr_id
          $controller = isset($_GET['controller'])  ? $_GET['controller'] : 'Product';
          $action     = isset($_GET['action'])      ? $_GET['action']     : 'showAll';
          $id         = isset($_GET['id'])          ? $_GET['id']         : null;
          // Dodanie do nazwy kontrolera przestrzeni nazw
      		$fullController = 'Controllers\\'.$controller;
      		// Utworzenie kontrolera (jeśli istnieje)
      		if (!class_exists($fullController))
            throw new \Exceptions\Application();
      		$appController = new $fullController();
          // Utworzenie obiektu widoku
          $appController->view = $this->createView('AppView');
      		// Sprawdzamy, czy akcja kontrolera istnieje
      		if (!method_exists($appController, $action))
              throw new \Exceptions\Application();
          // Uruchamiamy akcję kontrolera
          $result = $appController->$action($id);
          // Przekazujemy zwrócone dane do widoku
          $appController->view->setData($result);
          // Renderujemy widok
          $appController->view->render();
        } catch (\Exceptions\DatabaseConnection $e) {
          d($e);
          //$this->redirect('404.html');
        } catch(\Exceptions\General $e) {
          d($e);
          //$this->redirect('404.html');
        } catch(\Exception $e) {
          $this->redirect('404.html');
        }
    }
  }
