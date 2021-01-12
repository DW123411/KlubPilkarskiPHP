<?php
	namespace Models;
	use \PDO;

  class Mecz extends PDODatabase {
		public function __construct() {
      	$this->table = 'mecz';
				parent::__construct();
    }

		public function selectAllInCategory($category){
				$data = array();
				$this->testConnection();
				$this->testTable($this->table);
	      try	{
						$query = 'SELECT * FROM `'.$this->table.'` WHERE IdS = :category';

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
		public function insert($ids, $data, $idstadion, $idklubgospodarze, $idklubgoscie, $bramkigospodarze, $bramkigoscie, $punktygospodarze, $punktygoscie, $opis, $idsedzia, $kibice) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($ids, $data, $idstadion, $idklubgospodarze, $idklubgoscie, $bramkigospodarze, $bramkigoscie, $punktygospodarze, $punktygoscie, $opis, $idsedzia, $kibice))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'INSERT INTO `'.$this->table.'` (
										`IdS`,
										`Data`,
										`IdStadion`,
										`IdKlubGospodarze`,
										`IdKlubGoscie`,
										`BramkiGospodarze`,
										`BramkiGoscie`,
										`PunktyGospodarze`,
										`PunktyGoscie`,
										`Opis`,
										`IdSedzia`,
										`Kibice`)';
					$query .= ' VALUES (:ids,
										:data,
										:idstadion,
										:idklubgospodarze,
										:idklubgoscie,
										:bramkigospodarze,
										:bramkigoscie,
										:punktygospodarze,
										:punktygoscie,
										:opis,
										:idsedzia,
										:kibice)';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':ids', $ids, PDO::PARAM_INT);
					$stmt->bindValue(':data', $data, PDO::PARAM_STR);
					$stmt->bindValue(':idstadion', $idstadion, PDO::PARAM_INT);
					$stmt->bindValue(':idklubgospodarze', $idklubgospodarze, PDO::PARAM_INT);
					$stmt->bindValue(':idklubgoscie', $idklubgoscie, PDO::PARAM_INT);
					$stmt->bindValue(':bramkigospodarze', $bramkigospodarze, PDO::PARAM_INT);
					$stmt->bindValue(':bramkigoscie', $bramkigoscie, PDO::PARAM_INT);
					$stmt->bindValue(':punktygospodarze', $punktygospodarze, PDO::PARAM_INT);
					$stmt->bindValue(':punktygoscie', $punktygoscie, PDO::PARAM_INT);
					$stmt->bindValue(':opis', $opis, PDO::PARAM_STR);
					$stmt->bindValue(':idsedzia', $idsedzia, PDO::PARAM_INT);
					$stmt->bindValue(':kibice', $kibice, PDO::PARAM_INT);
					if($stmt->execute())
						$id = $this->pdo->lastInsertId();
					$stmt->closeCursor();
			}
			catch(\PDOException $e)	{
					throw new \Exceptions\Query($e);
			}
			return $id;
		}
		public function update($idm, $ids, $data, $idstadion, $idklubgospodarze, $idklubgoscie, $bramkigospodarze, $bramkigoscie, $punktygospodarze, $punktygoscie, $opis, $idsedzia, $kibice) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($idm, $ids, $data, $idstadion, $idklubgospodarze, $idklubgoscie, $bramkigospodarze, $bramkigoscie, $punktygospodarze, $punktygoscie, $idsedzia, $kibice))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'UPDATE `'.$this->table.'`
										SET
										IdS = :ids,
										Data = :data,
										IdStadion = :idstadion,
                    					IdKlubGospodarze = :idklubgospodarze,
                    					IdKlubGoscie = :idklubgoscie,
                    					BramkiGospodarze = :bramkigospodarze,
                    					BramkiGoscie = :bramkigoscie,
                    					PunktyGospodarze = :punktygospodarze,
                    					PunktyGoscie = :punktygoscie,
                    					Opis = :opis,
                    					IdSedzia = :idsedzia,
                    					Kibice = :kibice
										WHERE id = :idm';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':idm', $idm, PDO::PARAM_INT);
					$stmt->bindValue(':ids', $ids, PDO::PARAM_INT);
					$stmt->bindValue(':data', $data, PDO::PARAM_STR);
					$stmt->bindValue(':idstadion', $idstadion, PDO::PARAM_INT);
					$stmt->bindValue(':idklubgospodarze', $idklubgospodarze, PDO::PARAM_INT);
					$stmt->bindValue(':idklubgoscie', $idklubgoscie, PDO::PARAM_INT);
					$stmt->bindValue(':bramkigospodarze', $bramkigospodarze, PDO::PARAM_INT);
					$stmt->bindValue(':bramkigoscie', $bramkigoscie, PDO::PARAM_INT);
					$stmt->bindValue(':punktygospodarze', $punktygospodarze, PDO::PARAM_INT);
					$stmt->bindValue(':punktygoscie', $punktygoscie, PDO::PARAM_INT);
					$stmt->bindValue(':opis', $opis, PDO::PARAM_STR);
					$stmt->bindValue(':idsedzia', $idsedzia, PDO::PARAM_INT);
					$stmt->bindValue(':kibice', $kibice, PDO::PARAM_INT);
					if($stmt->execute())
						$id = $this->pdo->lastInsertId();
					$stmt->closeCursor();
			}
			catch(\PDOException $e)	{
					throw new \Exceptions\Query($e);
			}
			return $id;
		}
		public function wyswietlTabeleLigowa($ids) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($ids))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'CALL TabelaLigowaSezon (:ids)';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':ids', $ids, PDO::PARAM_INT);
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
