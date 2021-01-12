{extends file="../baseTemplate.html.tpl"}
{block name=title}Formularz rejestracji{/block}
{block name=body}
<div class="container">
<form id="regform" action="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}zarejestruj/" method="post">
  <div class="form-group">
    <label for="login">Login</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Wprowadź login">
  </div>
  <div class="form-group">
    <label for="imie">Imię</label>
    <input type="text" class="form-control" id="imie" name="imie" placeholder="Wprowadź imię">
  </div>
  <div class="form-group">
    <label for="nazwisko">Nazwisko</label>
    <input type="text" class="form-control" id="nazwisko" name="nazwisko" placeholder="Wprowadź Nazwisko">
  </div>
  <div class="form-group">
    <label for="haslo">Hasło</label>
    <input type="password" class="form-control" id="haslo" name="haslo" placeholder="Wprowadź hasło">
  </div>
  <div class="alert alert-danger collapse" role="alert"></div>
  <button type="submit" class="btn btn-default">Zarejestruj</button>
</form>
</div>
{/block}
