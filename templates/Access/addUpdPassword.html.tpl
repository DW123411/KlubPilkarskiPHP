{extends file="../baseForm.html.tpl"}

{block name=title}Zmień hasło{/block}

{block name=action}
user/zmien-haslo/
{/block}
{block name=formBody}
<input type="hidden" id="id" name="id" value="{if isset($data['id'])}{$data['id']}{/if}">
  {include file="./passwordForm.html.tpl"}
{/block}
