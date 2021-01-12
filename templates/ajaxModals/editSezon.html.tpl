{extends file="../modals/formBlock.html.tpl"}
{block name=action}sezon/modyfikuj/{/block}
{block name=title}Modyfikuj sezon{/block}
{block name=body}
  <input type="hidden" id="id" name="id" value="{if isset($data['id'])}{$data['id']}{/if}">
  {include file="../Sezon/sezonForm.html.tpl"}
{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Modyfikuj</button>{/block}
