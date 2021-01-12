{extends file="../baseForm.html.tpl"}

{block name=title}Nowy mecz{/block}

{block name=action}
mecz/dodaj/
{/block}
{block name=formBody}
  {include file="./meczForm.html.tpl"}
{/block}
