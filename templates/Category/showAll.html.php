<?php include './templates/header.html.php'; ?>
<?php
    $url = $this->get('protocol').$_SERVER['HTTP_HOST'].$this->get('subdir');
    $categories = $this->get('data');
    $amount = $this->get('amount');
 ?>
<h1>Lista kategori</h1>
<ul>
	<?php
      if(isset($categories)) {
      foreach($categories as $category) {
  ?>
	<li>
      <?php
			   echo ('<a href="'.$url.'produkt/kategoria/'.$category['id'].'">'.$category['nazwa'].'</a>');
         if(isset($amount[$category['id']])) echo (' - ' . $amount[$category['id']]);
         else echo (' - 0');
      ?>
      <a href="<?php echo($url); ?>kategoria/usun/<?php echo($category['id']) ?>">[usuń]</a><br/>
	</li>
	<?php
        }}
    ?>
</ul>
<br/><br/>
<a href="<?php echo($url); ?>kategoria/formularz/">Dodaj kategorię</a><br/>
<a href="<?php echo($url); ?>produkt/">Lista produktów</a>
<?php include './templates/footer.html.php'; ?>
