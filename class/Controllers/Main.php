<?php
  namespace Controllers;

  /**
   * Główny kontroler aplikacji
   */
  final class Main extends Controller {
    public function __construct() {
        try {
          // Inicjalizacja sesji anonimowej
          \Tools\Session::initialize();
          // Pobieramy informacje z sesji
          $this->getFlashMessageFromSession();
          // Kontroler / akcja / parametr_id
          $router = \Tools\Router::getRouter();
          $match = $router->match();
          // Kontroler / akcja / parametr_id
          $controller = isset($match['target']['controller'])  ? $match['target']['controller'] : 'Zawodnik';
          $action     = isset($match['target']['action'])      ? $match['target']['action']     : 'showAll';
          $id         = isset($match['params']['id'])          ? $match['params']['id']         : null;
          // Dodanie do nazwy kontrolera przestrzeni nazw
          $fullController = 'Controllers\\'.$controller;
          // Utworzenie kontrolera (jeśli istnieje)
          if (!class_exists($fullController))
            throw new \Exceptions\Application();
          $appController = new $fullController();
          // Utworzenie obiektu widoku
          $appController->view = $this->createView('AppView');
          // Niezalogowany użytkownik
          $result = [];
          if (\Tools\Access::islogin() !== true) {
              // Logowanie do systemu lub rejestracja
              if ($controller === 'Access' && (
                      $action === 'login'   ||
                      $action === 'add'     ||
                      $action === 'regForm' ||
                      $action === 'logForm' ||
                      $action === 'register') ||
                      $action === 'showAll') {
                  $result = $appController->$action();
              } else {
                  \Tools\FlashMessage::addWarning(\Messages\Warning::$nologin);
                  if (preg_match('/^ajax/', $action) === 1) // Zapytanie asynchroniczne
                    $appController->view->setTemplate('ajaxModals/notAllow');
                  else // To nie jest zapytanie asynchroniczne
                    $this->redirect('formularz-logowania/');
              }
          } else {
            // Sprawdzamy, czy akcja kontrolera istnieje
            if (!\method_exists($appController, $action))
                throw new \Exceptions\Application();
            // Uruchamiamy akcję kontrolera
            $result = $appController->$action($id);
          }
          // Przekazujemy zwrócone dane do widoku
          $appController->view->setData($result);
          // Ustawiamy dla widoku komunikaty
          $appController->view->set('warning', \Tools\FlashMessage::getWarning());
          $appController->view->set('success', \Tools\FlashMessage::getSuccess());
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
    /**
     * Pobranie FlashMessage z sesji i dodanie do zbioru FlashMessage
     */
    private function getFlashMessageFromSession() {
      //pobieramy informacje z sesji
      $warning = \Tools\Session::get('warning');
      \Tools\Session::clear('warning');
      $success = \Tools\Session::get('success');
      \Tools\Session::clear('success');

      if(isset($warning))
          \Tools\FlashMessage::addWarningSet($warning);
      if(isset($success))
          \Tools\FlashMessage::addSuccessSet($success);
    }
  }
