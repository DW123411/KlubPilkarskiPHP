<?php include './templates/header.html.php'; ?>
<?php
    $url = $this->get('protocol').$_SERVER['HTTP_HOST'].$this->get('subdir');
    $products = $this->get('data');
    $categories = $this->get('categories');
 ?>
<h1>Lista produktów w kategorii: <?php echo($categories[$this->get('selectedCategory')]['nazwa']) ?></h1>
<ul>
	<?php
      if(isset($categories) && isset($products)) {
      foreach($products as $product) {
  ?>
	<li>
      <?php
			   echo ('<a href="'.$url.'produkt/'.$product['id'].'">'.$product['nazwa'].'</a>');
         echo (' - ');
         echo ('<a href="'.$url.'produkt/kategoria/'.$product['id_kategorii'].'">'.$categories[$product['id_kategorii']]['nazwa'].'</a>');
      ?>
	</li>
	<?php
        }}
    ?>
</ul>
<br/><br/>
<a href="<?php echo($url); ?>produkt/">Lista produktów</a><br/>
<a href="<?php echo($url); ?>produkt/formularz/">Dodaj produkt</a><br/>
<a href="<?php echo($url); ?>kategoria/">Lista kategorii</a>
<?php include './templates/footer.html.php'; ?>
