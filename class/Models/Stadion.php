<?php
	namespace Models;
	use \PDO;

  class Stadion extends PDODatabase {
		public function __construct() {
      	$this->table = 'stadion';
				parent::__construct();
    }
		public function insert($nazwa, $miejscowosc, $pojemnosc) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($nazwa) && !isset($miejscowosc) && !isset($pojemnosc))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'INSERT INTO `'.$this->table.'` (
										`Nazwa`, `Miejscowosc`, `Pojemnosc`)';
					$query .= ' VALUES (:nazwa, :miejscowosc, :pojemnosc)';
					$stmt = $this->pdo->prepare($query);
					$stmt->bindValue(':nazwa', $nazwa, PDO::PARAM_STR);
					$stmt->bindValue(':miejscowosc', $miejscowosc, PDO::PARAM_STR);
					$stmt->bindValue(':pojemnosc', $pojemnosc, PDO::PARAM_INT);

					if($stmt->execute())
						$id = $this->pdo->lastInsertId();
					$stmt->closeCursor();
			}
			catch(\PDOException $e)	{
					throw new \Exceptions\Query($e);
			}
			return $id;
		}
		public function update($ids, $nazwa, $miejscowosc, $pojemnosc) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($ids, $nazwa, $miejscowosc, $pojemnosc))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'UPDATE `'.$this->table.'`
										SET
										Nazwa = :nazwa,
										Miejscowosc = :miejscowosc,
										Pojemnosc = :pojemnosc
										WHERE id = :ids';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':ids', $ids, PDO::PARAM_INT);
					$stmt->bindValue(':nazwa', $nazwa, PDO::PARAM_STR);
					$stmt->bindValue(':miejscowosc', $miejscowosc, PDO::PARAM_STR);
					$stmt->bindValue(':pojemnosc', $pojemnosc, PDO::PARAM_INT);
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
