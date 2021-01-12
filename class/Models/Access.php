<?php
	namespace Models;
	use \PDO;

	/**
	 * Obsługa procesu logowania
	 */
	class Access extends PDODatabase {
		public function __construct() {
      		$this->table = 'uzytkownik';
			parent::__construct();
    	}
    	/**
		 * logowanie do systemu
		 */
		public function login($login, $password) {
			//pobranie z bazy informacji o użytkowniku posiadającym login
			$users = $this->selectAll('uzytkownik');
			foreach ($users as $user) {
				if(isset($user)){
				// Poprawne zalogowanie się użytkownika
 					if($this->checkPassword($user['Haslo'], $password))
 					{
 						//zainicjalizowanie sesji
 						\Tools\Access::login($user['Login'], $user['Imie'].' '.$user['Nazwisko'], $user['id']);
 	        			return true;
 					}
 				}
			}
			return false;
 		  	/*$user[0] = ['id'			=> 1,
									'login' 	=> 'login',
									'name'		=> 'Name',
									'surname'	=> 'Surname',
							 		'password'=> md5('login' . md5('123456'))];
 			if(isset($user[0])){
				// Poprawne zalogowanie się użytkownika
 				if($this->checkPassword($user[0]['password'], $password))
 				{
 					//zainicjalizowanie sesji
 					\Tools\Access::login($login, $user[0]['surname'].' '.$user[0]['name'] , $user[0]['id']);
 	        return true;
 				}
 			}
			return false;*/
		}
		public function register($login,$imie,$nazwisko,$haslo){
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($login, $imie, $nazwisko, $haslo))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'INSERT INTO `'.$this->table.'` (
										`Login`,
										`Imie`,
										`Nazwisko`,
                    					`Haslo`)';
                    $query .= ' VALUES (:login,
                    					:imie,
                    					:nazwisko,
                    					:haslo
                    					)';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':login', $login, PDO::PARAM_STR);
					$stmt->bindValue(':imie', $imie, PDO::PARAM_STR);
					$stmt->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR);
					$stmt->bindValue(':haslo', $haslo, PDO::PARAM_STR);
					if($stmt->execute())
						$id = $this->pdo->lastInsertId();
					$stmt->closeCursor();
			}
			catch(\PDOException $e)	{
					throw new \Exceptions\Query($e);
			}
			return $id;
		}
		/**
		 * Sprawdza zgodność hasła i jego powtórzenia
		 */
		public function checkPassword($password, $password2) {
			return $password === $password2;
		}
		/**
		 * Wylogowanie użytkownika z systemu
		 */
		public function logout(){
			\Tools\Access::logout();
		}
		public function edytujUzytkownika($idu, $imie, $nazwisko){
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($idu, $imie, $nazwisko))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'UPDATE `'.$this->table.'`
										SET
										Imie = :imie,
										Nazwisko = :nazwisko
										WHERE id = :idu';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':idu', $idu, PDO::PARAM_STR);
					$stmt->bindValue(':imie', $imie, PDO::PARAM_STR);
					$stmt->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR);
					if($stmt->execute())
						$id = $this->pdo->lastInsertId();
					$stmt->closeCursor();
			}
			catch(\PDOException $e)	{
					throw new \Exceptions\Query($e);
			}
			return $id;
		}
		public function zmienHaslo($idu, $haslo){
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($idu, $haslo))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'UPDATE `'.$this->table.'`
										SET
										Haslo = :haslo
										WHERE id = :idu';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':idu', $idu, PDO::PARAM_STR);
					$stmt->bindValue(':haslo', $haslo, PDO::PARAM_STR);
					if($stmt->execute())
						$id = $this->pdo->lastInsertId();
					$stmt->closeCursor();
			}
			catch(\PDOException $e)	{
					throw new \Exceptions\Query($e);
			}
			return $id;
		}

	}
	