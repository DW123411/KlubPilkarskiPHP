<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>Instalacja</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
	require 'vendor/autoload.php';
  /*
  CREATE DATABASE aplikacja
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;
  */

  $pdo = \Handles\MySQL::getHandle();
  d($pdo);
  /*
      usunięcie starych tabel
  */
  $query = 'DROP TABLE IF EXISTS `produkty`';
	try
	{
		$pdo->exec($query);
	}
	catch(\PDOException $e)
	{
		echo 'Błąd usuwania tabeli produkty';
	}

  $query = 'DROP TABLE IF EXISTS `kategorie`';
	try
	{
		$pdo->exec($query);
	}
	catch(PDOException $e)
	{
		echo 'Błąd usuwania tabeli kategorie';
	}

  /*
      tworzenie tabeli kategorii
  */
	$query = 'CREATE TABLE IF NOT EXISTS `kategorie` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`nazwa` VARCHAR(30) NOT NULL,
		PRIMARY KEY (id)) ENGINE=InnoDB;';
  d($query);
	try
	{
		$pdo->exec($query);
	}
	catch(\PDOException $e)
	{
		echo 'Błąd tworzenia tabeli kategorie';
	}

  /*
      tworzenie tabeli produktów
  */
  $query = 'CREATE TABLE IF NOT EXISTS `produkty` (
      `id` INT AUTO_INCREMENT,
	     `nazwa` VARCHAR(30) NOT NULL,
	     `opis` VARCHAR(100) NOT NULL,
	     `cena` FLOAT NOT NULL,
	     `id_kategorii` INT NOT NULL,
	      PRIMARY KEY (id),
	      FOREIGN KEY (id_kategorii) REFERENCES kategorie(id) ON DELETE CASCADE
	) ENGINE=InnoDB;';
  d($query);
	try
	{
		$pdo->exec($query);
	}
	catch(\PDOException $e)
	{
		echo 'Błąd tworzenia tabeli produkty';
	}

  /*
      wypełnienie tabel danymi
  */

  $kategorie = array();
	$kategorie[] = 'pieczywo';
	$kategorie[] = 'chemia';
	$kategorie[] = 'kosmetyki';
	$kategorie[] = 'wędliny';
	$kategorie[] = 'mięso';
	$kategorie[] = 'napoje';

	try
	{
		$stmt = $pdo -> prepare('INSERT INTO `kategorie` (`nazwa`) VALUES(:kategoria)');
		foreach($kategorie as $kategoria)
		{
			$stmt -> bindValue(':kategoria', $kategoria, PDO::PARAM_STR);
			$stmt -> execute();
		}
	}
	catch(\PDOException $e)
	{
		echo 'Błąd dodawania danych do tabeli kategorie';
	}


  $produkty = array();
	$produkty[] = array(
						'nazwa' => 'chleb',
						'opis' => 'chleb pszenny',
						'cena' => '2.50',
						'id_kategorii' => '1');
	$produkty[] = array(
						'nazwa' => 'kajzerka',
						'opis' => 'Bułka mała',
						'cena' => '0.35',
						'id_kategorii' => '1');
	$produkty[] = array(
						'nazwa' => 'szamon do włosów',
						'opis' => 'szamon do włosów normalnych',
						'cena' => '8.00',
						'id_kategorii' => '2');
	$produkty[] = array(
						'nazwa' => 'proszek do prania',
						'opis' => 'proszek do prania kolorowego, uniwersalny',
						'cena' => '4.80',
						'id_kategorii' => '2');
	$produkty[] = array(
						'nazwa' => 'płyn do naczyń',
						'opis' => 'płyn do naczyń uniwersalny o zapachu pomarańczy',
						'cena' => '3.50',
						'id_kategorii' => '2');
	$produkty[] = array(
						'nazwa' => 'krem',
						'opis' => 'krem do rąk',
						'cena' => '5.00',
						'id_kategorii' => '3');
	$produkty[] = array(
						'nazwa' => 'szynka',
						'opis' => 'szynka tradycyjna bez konserwantów',
						'cena' => '28.00',
						'id_kategorii' => '4');
	$produkty[] = array(
						'nazwa' => 'kiełbasa',
						'opis' => 'kiełbasa ślaska',
						'cena' => '22.50',
						'id_kategorii' => '4');
	$produkty[] = array(
						'nazwa' => 'schab',
						'opis' => 'schab bez kości',
						'cena' => '20.00',
						'id_kategorii' => '5');
	$produkty[] = array(
						'nazwa' => 'mięso mielone',
						'opis' => 'mięso mielone wieprzowe',
						'cena' => '15.50',
						'id_kategorii' => '5');
	$produkty[] = array(
						'nazwa' => 'sok',
						'opis' => 'sok pomarańczowy 100%',
						'cena' => '4.50',
						'id_kategorii' => '6');

	try
	{
		$stmt = $pdo -> prepare('INSERT INTO `produkty` (`nazwa`, `opis`, `cena`, `id_kategorii`) VALUES(:nazwa, :opis, :cena, :id_kategorii)');
		foreach($produkty as $produkt)
		{
			//strval($float), nie ma typu PDO::PARAM_FLOAT
			$stmt -> bindValue(':nazwa', $produkt['nazwa'], PDO::PARAM_STR);
			$stmt -> bindValue(':opis', $produkt['opis'], PDO::PARAM_STR);
			$stmt -> bindValue(':cena', $produkt['cena'], PDO::PARAM_STR);
			$stmt -> bindValue(':id_kategorii', $produkt['id_kategorii'], PDO::PARAM_INT);
			$stmt -> execute();
		}
	}
	catch(\PDOException $e)
	{
		echo 'Błąd dodawania danych do tabeli kategorie';
	}
  echo "<b>Instalacja aplikacji zakończona!</b>"
?>
</body>
</html>
