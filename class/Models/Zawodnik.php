<?php
	namespace Models;
	use \PDO;

  class Zawodnik extends PDODatabase {
		public function __construct() {
      	$this->table = 'zawodnik';
				parent::__construct();
    }
		public function insert($imie, $nazwisko, $idk, $opis) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($imie) && !isset($nazwisko) && !isset($idk) && !isset($opis))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'INSERT INTO `'.$this->table.'` (
										`Imie`, `Nazwisko`, `IdK`, `Opis`)';
					$query .= ' VALUES (:imie, :nazwisko, :idk, :opis)';
					$stmt = $this->pdo->prepare($query);
					$stmt->bindValue(':imie', $imie, PDO::PARAM_STR);
					$stmt->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR);
					$stmt->bindValue(':idk', $idk, PDO::PARAM_STR);
					$stmt->bindValue(':opis', $opis, PDO::PARAM_STR);

					if($stmt->execute())
						$id = $this->pdo->lastInsertId();
					$stmt->closeCursor();
			}
			catch(\PDOException $e)	{
					throw new \Exceptions\Query($e);
			}
			return $id;
		}
		public function update($idz, $imie, $nazwisko, $idk, $opis) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($idz, $imie, $nazwisko, $idk))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'UPDATE `'.$this->table.'`
										SET
										Imie = :imie,
										Nazwisko = :nazwisko,
										IdK = :idk,
                    					Opis = :opis
										WHERE id = :idz';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':idz', $idz, PDO::PARAM_STR);
					$stmt->bindValue(':imie', $imie, PDO::PARAM_STR);
					$stmt->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR);
					$stmt->bindValue(':idk', $idk, PDO::PARAM_INT);
          			$stmt->bindValue(':opis', $opis, PDO::PARAM_INT);
					if($stmt->execute())
						$id = $this->pdo->lastInsertId();
					$stmt->closeCursor();
			}
			catch(\PDOException $e)	{
					throw new \Exceptions\Query($e);
			}
			return $id;
		}
		public function wyswietlStatystyki($idz) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($idz))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'CALL ZawodnikStatystyki (:idz)';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':idz', $idz, PDO::PARAM_INT);
					//d($stmt);
					//d($ids);
					if($stmt->execute())
						$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
						$id = $this->pdo->lastInsertId();
					$stmt->closeCursor();
			}
			catch(\PDOException $e)	{
					throw new \Exceptions\Query($e);
			}
			//d($result);
			return $result;
		}

  }
