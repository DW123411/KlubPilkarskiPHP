{extends file="../baseForm.html.tpl"}

{block name=title}Modyfikuj zawodnika{/block}

{block name=action}
zawodnik/mod/{$data['id']}/
{/block}
{block name=formBody}
  {include file="./zawodnikForm.html.tpl"}
{/block}
