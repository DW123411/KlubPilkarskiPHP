<?php
  namespace Controllers;

  /**
   * Główny kontroler aplikacji
   */
  final class Main extends Controller {
    public function __construct() {
        try {
          $pdo = \Handles\MySQL::getHandle();
          try	{
                $query = 'SELECT * FROM `produkty`';
                $stmt = $pdo->prepare($query);
      					if($stmt->execute())
      					     $data = $stmt->fetchAll();
      					$stmt->closeCursor();
                d($data);
            }
            catch(\PDOException $e)	{
                $data['error'] = \Config\Database\DBErrorName::$query;
            }
        } catch (\Exceptions\DatabaseConnection $e) {
          $this->redirect('404.html');
        } catch(\Exceptions\General $e) {
          $this->redirect('404.html');
        } catch(\Exception $e) {
          $this->redirect('404.html');
        }
    }
  }
