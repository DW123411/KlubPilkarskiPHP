<?php
	namespace Models;
	use \PDO;

  class Category extends PDODatabase {
		public function __construct() {
      	$this->table = 'kategorie';
				parent::__construct();
    }
		public function insert($name) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($name))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'INSERT INTO `'.$this->table.'` (
										`nazwa`)';
					$query .= ' VALUES (:name)';
					$stmt = $this->pdo->prepare($query);
					$stmt->bindValue(':name', $name, PDO::PARAM_STR);
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
