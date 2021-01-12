{extends file="../baseForm.html.tpl"}

{block name=title}Nowy zawodnik{/block}

{block name=action}
zawodnik/dodaj/
{/block}
{block name=formBody}
  {include file="./zawodnikForm.html.tpl"}
{/block}
