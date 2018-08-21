<?php include './templates/header.html.php'; ?>
<?php
    $url = $this->get('protocol').$_SERVER['HTTP_HOST'].$this->get('subdir');
    $product = $this->get('data');
    $categories = $this->get('categories');
 ?>
<h1>Produkt</h1>
<div>
	<?php
      if(isset($categories) && isset($product)) {
  ?>
  <?php
	   echo ('Nazwa: '.$product['nazwa'].'<br/>');
     echo ('Opis: '.$product['opis'].'<br/>');

     echo ('Cena: '.sprintf('%.2f zł', $product['cena']).'<br/>');
     echo ('Kategoria: <a href="'.$url.'produkt/kategoria/'.$product['id_kategorii'].'">'.$categories[$product['id_kategorii']]['nazwa'].'</a>');
  ?>
  <br/><a href="<?php echo($url); ?>produkt/usun/<?php echo($product['id']) ?>">[usuń produkt]</a><br/>
	<?php
      }
  ?>
</div>
<br/><br/>
<a href="<?php echo($url); ?>produkt/">Lista produktów</a><br/>
<a href="<?php echo($url); ?>produkt/formularz/">Dodaj produkt</a><br/>
<a href="<?php echo($url); ?>kategoria/">Lista kategorii</a>
<?php include './templates/footer.html.php'; ?>
