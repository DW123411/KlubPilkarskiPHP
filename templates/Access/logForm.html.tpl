{extends file="../baseTemplate.html.tpl"}
{block name=title}Formularz logowania{/block}
{block name=body}
<div class="container">
<form id="logform" action="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}zaloguj/" method="post">
  <div class="form-group">
    <label for="login">Login</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Wprowadź login">
  </div>
  <div class="form-group">
    <label for="password">Hasło</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Wprowadź hasło">
  </div>
  <div class="alert alert-danger collapse" role="alert"></div>
  <button type="submit" class="btn btn-default">Zaloguj</button>
</form>
</div>
{/block}
