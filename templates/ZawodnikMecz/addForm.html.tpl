{extends file="../baseForm.html.tpl"}

{block name=title}Nowy występ zawodnika w meczu{/block}

{block name=action}
zawodnikmecz/dodaj/
{/block}
{block name=formBody}
  {include file="./zawodnikmeczForm.html.tpl"}
{/block}
