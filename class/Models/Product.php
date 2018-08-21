<?php
	namespace Models;
	use \PDO;

  class Product extends PDODatabase {
		public function __construct() {
      	$this->table = 'produkty';
				parent::__construct();
    }

		public function selectAllInCategory($category){
				$data = array();
				$this->testConnection();
				$this->testTable($this->table);
	      try	{
						$query = 'SELECT * FROM `'.$this->table.'` WHERE id_kategorii = :category';

						$stmt = $this->pdo->prepare($query);
						$stmt->bindValue(':category', $category, PDO::PARAM_INT);
						if($stmt->execute())
						     $data = $stmt->fetchAll();
						$stmt->closeCursor();
	      }
	      catch(\PDOException $e)	{
	          throw new \Exceptions\Query($e);
	      }
	      return $data;
		}
		public function insert($name, $description, $price, $category) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($name, $description, $price, $category))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'INSERT INTO `'.$this->table.'` (
										`nazwa`,
										`opis`,
										`cena`,
										`id_kategorii`)';
					$query .= ' VALUES (:name,
														  :description,
															:price,
															:category)';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':name', $name, PDO::PARAM_STR);
					$stmt->bindValue(':description', $description, PDO::PARAM_STR);
					$stmt->bindValue(':price', $price, PDO::PARAM_STR);
					$stmt->bindValue(':category', $category, PDO::PARAM_INT);
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
