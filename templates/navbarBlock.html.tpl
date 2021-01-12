<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}start">ZPAI</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      {block name=leftNavbar}
      <ul class="nav navbar-nav">
          <li><a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}zawodnik/">Zawodnicy</a></li>
          <li><a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}klub/">Kluby</a></li>
          <li><a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}mecz/">Mecze</a></li>
          <li><a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}sedzia/">Sędziowie</a></li>
          <li><a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}sezon/">Sezony</a></li>
          <li><a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}stadion/">Stadiony</a></li>
          <li><a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}trener/">Trenerzy</a></li>
          <li><a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}zawodnikmecz/" id="statystyki">Statystyki</a></li>
      </ul>
      {/block}
      {block name=rightNavbar}
      <ul class="nav navbar-nav navbar-right">
        {if !isset($isLogin) || !$isLogin}
          <li><a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}formularz-logowania/">Zaloguj się</a></li>
          <li><a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}formularz-rejestracji/">Rejestracja</a></li>
        {else}
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Użytkownik zalogowany <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a id="edit-user" href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}user/mod/{$smarty.session.id}/">Edytuj profil</a></li>
            <li><a id="edit-password" href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}user/zmien-haslo/{$smarty.session.id}/">Zmień hasło</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}wyloguj/">Wyloguj się</a></li>
          </ul>
        </li>
        {/if}
      </ul>
      {/block}
    </div><!--/.nav-collapse -->
  </div>
</nav>
