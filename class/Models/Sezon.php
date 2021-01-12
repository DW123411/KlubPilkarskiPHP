<?php
	namespace Models;
	use \PDO;

  class Sezon extends PDODatabase {
		public function __construct() {
      	$this->table = 'sezon';
				parent::__construct();
    }
		public function insert($rokod, $rokdo) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($rokod) && !isset($rokdo))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'INSERT INTO `'.$this->table.'` (
										`RokOd`, `RokDo`)';
					$query .= ' VALUES (:rokod, :rokdo)';
					$stmt = $this->pdo->prepare($query);
					$stmt->bindValue(':rokod', $rokod, PDO::PARAM_STR);
					$stmt->bindValue(':rokdo', $rokdo, PDO::PARAM_STR);

					if($stmt->execute())
						$id = $this->pdo->lastInsertId();
					$stmt->closeCursor();
			}
			catch(\PDOException $e)	{
					throw new \Exceptions\Query($e);
			}
			return $id;
		}
		public function update($ids, $rokod, $rokdo) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($ids, $rokod, $rokdo))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'UPDATE `'.$this->table.'`
										SET
										RokOd = :rokod,
										RokDo = :rokdo
										WHERE id = :ids';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':ids', $ids, PDO::PARAM_STR);
					$stmt->bindValue(':rokod', $rokod, PDO::PARAM_STR);
					$stmt->bindValue(':rokdo', $rokdo, PDO::PARAM_STR);
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
