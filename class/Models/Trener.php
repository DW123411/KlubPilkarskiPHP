<?php
	namespace Models;
	use \PDO;

  class Trener extends PDODatabase {
		public function __construct() {
      	$this->table = 'trener';
				parent::__construct();
    }
		public function insert($imie, $nazwisko) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($imie) && !isset($nazwisko))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'INSERT INTO `'.$this->table.'` (
										`Imie`, `Nazwisko`)';
					$query .= ' VALUES (:imie, :nazwisko)';
					$stmt = $this->pdo->prepare($query);
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
		public function update($idt, $imie, $nazwisko) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($idt, $imie, $nazwisko))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'UPDATE `'.$this->table.'`
										SET
										Imie = :imie,
										Nazwisko = :nazwisko
										WHERE id = :idt';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':idt', $idt, PDO::PARAM_INT);
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

  }
