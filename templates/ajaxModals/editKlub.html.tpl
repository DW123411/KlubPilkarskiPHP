{extends file="../modals/formBlock.html.tpl"}
{block name=action}klub/modyfikuj/{/block}
{block name=title}Modyfikuj klub{/block}
{block name=body}
  <input type="hidden" id="id" name="id" value="{if isset($data['id'])}{$data['id']}{/if}">
  {include file="../Klub/klubForm.html.tpl"}
{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Modyfikuj</button>{/block}
