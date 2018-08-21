<?php include './templates/header.html.php'; ?>
<?php
    $url = $this->get('protocol').$_SERVER['HTTP_HOST'].$this->get('subdir');
    $categories = $this->get('categories');
 ?>
<h1>Nowy produkt</h1>
<form action="<?php echo($url); ?>produkt/dodaj/" method="post">
    Nazwa produktu: <input type="text" name="nazwa" /><br />
	  Opis produktu: <input type="text" name="opis" /><br />
	  Cena produktu: <input type="text" name="cena" /><br />
	  Kategoria: <select name="id_kategorii">
    <?php
        foreach($categories as $id => $category) {
    ?>
          <option value="<?php echo($id); ?>"><?php echo ($category['nazwa']);?></option>
    <?php
        }
    ?>
    </select>

    <br/>
    <input type="submit" value="Dodaj" />
</form>
<br/><br/>
<a href="<?php echo($url); ?>produkt/">Lista produktów</a><br/>
<a href="<?php echo($url); ?>kategoria/">Lista kategorii</a>
<?php include './templates/footer.html.php'; ?>
