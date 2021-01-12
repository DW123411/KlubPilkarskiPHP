<?php
	namespace Models;
	use \PDO;

  class ZawodnikMecz extends PDODatabase {
		public function __construct() {
      	$this->table = 'zawodnikmecz';
				parent::__construct();
    }

		public function insert($idm, $idz, $pozycja, $minutyod, $minutydo, $bramki, $asysty, $kartkizolte, $kartkiczerwone, $podaniaudane, $podanianieudane) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($idm, $idz, $pozycja, $minutyod, $minutydo, $bramki, $asysty, $kartkizolte, $kartkiczerwone, $podaniaudane, $podanianieudane))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'INSERT INTO `'.$this->table.'` (
										`IdM`,
										`IdZ`,
										`Pozycja`,
										`MinutyOd`,
										`MinutyDo`,
										`Bramki`,
										`Asysty`,
										`KartkiZolte`,
										`KartkiCzerwone`,
										`PodaniaUdane`,
										`PodaniaNieudane`)';
					$query .= ' VALUES (:idm,
										:idz,
										:pozycja,
										:minutyod,
										:minutydo,
										:bramki,
										:asysty,
										:kartkizolte,
										:kartkiczerwone,
										:podaniaudane,
										:podanianieudane)';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':idm', $idm, PDO::PARAM_INT);
					$stmt->bindValue(':idz', $idz, PDO::PARAM_INT);
					$stmt->bindValue(':pozycja', $pozycja, PDO::PARAM_STR);
					$stmt->bindValue(':minutyod', $minutyod, PDO::PARAM_INT);
					$stmt->bindValue(':minutydo', $minutydo, PDO::PARAM_INT);
					$stmt->bindValue(':bramki', $bramki, PDO::PARAM_INT);
					$stmt->bindValue(':asysty', $asysty, PDO::PARAM_INT);
					$stmt->bindValue(':kartkizolte', $kartkizolte, PDO::PARAM_INT);
					$stmt->bindValue(':kartkiczerwone', $kartkiczerwone, PDO::PARAM_INT);
					$stmt->bindValue(':podaniaudane', $podaniaudane, PDO::PARAM_INT);
					$stmt->bindValue(':podanianieudane', $podanianieudane, PDO::PARAM_INT);
					if($stmt->execute())
						$id = $this->pdo->lastInsertId();
					$stmt->closeCursor();
			}
			catch(\PDOException $e)	{
					throw new \Exceptions\Query($e);
			}
			return $id;
		}
		public function update($idzm, $idm, $idz, $pozycja, $minutyod, $minutydo, $bramki, $asysty, $kartkizolte, $kartkiczerwone, $podaniaudane, $podanianieudane) {
			$id = -1;
			$this->testConnection();
			$this->testTable($this->table);
			if(!isset($idzm, $idm, $idz, $pozycja, $minutyod, $minutydo, $bramki, $asysty, $kartkizolte, $kartkiczerwone, $podaniaudane, $podanianieudane))
					throw new AppException(ErrorName::$empty);
			try	{
					$query = 'UPDATE `'.$this->table.'`
										SET
										IdM = :idm,
										IdZ = :idz,
										Pozycja = :pozycja,
										MinutyOd = :minutyod,
										MinutyDo = :minutydo,
										Bramki = :bramki,
										Asysty = :asysty,
										KartkiZolte = :kartkizolte,
										KartkiCzerwone = :kartkiczerwone,
										PodaniaUdane = :podaniaudane,
										PodaniaNieudane = :podanianieudane
										WHERE id = :idzm';
					$stmt = $this->pdo->prepare($query);

					$stmt->bindValue(':idzm', $idzm, PDO::PARAM_INT);
					$stmt->bindValue(':idm', $idm, PDO::PARAM_INT);
					$stmt->bindValue(':idz', $idz, PDO::PARAM_INT);
					$stmt->bindValue(':pozycja', $pozycja, PDO::PARAM_STR);
					$stmt->bindValue(':minutyod', $minutyod, PDO::PARAM_INT);
					$stmt->bindValue(':minutydo', $minutydo, PDO::PARAM_INT);
					$stmt->bindValue(':bramki', $bramki, PDO::PARAM_INT);
					$stmt->bindValue(':asysty', $asysty, PDO::PARAM_INT);
					$stmt->bindValue(':kartkizolte', $kartkizolte, PDO::PARAM_INT);
					$stmt->bindValue(':kartkiczerwone', $kartkiczerwone, PDO::PARAM_INT);
					$stmt->bindValue(':podaniaudane', $podaniaudane, PDO::PARAM_INT);
					$stmt->bindValue(':podanianieudane', $podanianieudane, PDO::PARAM_INT);
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
