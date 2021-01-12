{extends file="../baseForm.html.tpl"}

{block name=title}Edytuj profil{/block}

{block name=action}
user/modyfikuj/
{/block}
{block name=formBody}
<input type="hidden" id="id" name="id" value="{if isset($data['id'])}{$data['id']}{/if}">
  {include file="./userForm.html.tpl"}
{/block}
