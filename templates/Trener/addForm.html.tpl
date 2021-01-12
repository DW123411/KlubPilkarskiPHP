{extends file="../baseForm.html.tpl"}

{block name=title}Nowy trener{/block}

{block name=action}
trener/dodaj/
{/block}
{block name=formBody}
  {include file="./trenerForm.html.tpl"}
{/block}
