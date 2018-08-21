<?php include './templates/header.html.php'; ?>
<?php
    $url = $this->get('protocol').$_SERVER['HTTP_HOST'].$this->get('subdir');
 ?>
<h1>Nowa kategoria</h1>
<form action="<?php echo($url); ?>kategoria/dodaj/" method="post">
    Nazwa kategorii: <input type="text" name="nazwa" /><br />
    <br/>
    <input type="submit" value="Dodaj" />
</form>
<br/><br/>
<a href="<?php echo($url); ?>produkt/">Lista produktów</a><br/>
<a href="<?php echo($url); ?>kategoria/">Lista kategorii</a>
<?php include './templates/footer.html.php'; ?>
