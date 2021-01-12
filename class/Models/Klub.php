<?php
	namespace Models;
	use \PDO;

  class Klub extends PDODatabase {
		public function __construct() {
      	$this->table = 'klub';
				parent::__construct();
    }
		public function insert($siedziba, $nazwa, $opis, $idt) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($siedziba) && !isset($nazwa) && !isset($opis) && !isset($idt))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'INSERT INTO `'.$this->table.'` (
										`Siedziba`, `Nazwa`, `Opis`, `IdT`)';
					$query .= ' VALUES (:siedziba, :nazwa, :opis, :idt)';
					$stmt = $this->pdo->prepare($query);
					$stmt->bindValue(':siedziba', $siedziba, PDO::PARAM_STR);
					$stmt->bindValue(':nazwa', $nazwa, PDO::PARAM_STR);
					$stmt->bindValue(':opis', $opis, PDO::PARAM_STR);
					$stmt->bindValue(':idt', $idt, PDO::PARAM_INT);

					if($stmt->execute())
						$id = $this->pdo->lastInsertId();
					$stmt->closeCursor();
			}
			catch(\PDOException $e)	{
					throw new \Exceptions\Query($e);
			}
			return $id;
		}
		public function update($idk, $siedziba, $nazwa, $opis, $idt) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($idk, $siedziba, $nazwa, $idt))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'UPDATE `'.$this->table.'`
										SET
										Siedziba = :siedziba,
										Nazwa = :nazwa,
										Opis = :opis,
                    					IdT = :idt
										WHERE id = :idk';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':idk', $idk, PDO::PARAM_INT);
					$stmt->bindValue(':siedziba', $siedziba, PDO::PARAM_STR);
					$stmt->bindValue(':nazwa', $nazwa, PDO::PARAM_STR);
					$stmt->bindValue(':opis', $opis, PDO::PARAM_STR);
          			$stmt->bindValue(':idt', $idt, PDO::PARAM_INT);
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
