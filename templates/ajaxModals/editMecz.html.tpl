{extends file="../modals/formBlock.html.tpl"}
{block name=action}mecz/modyfikuj/{/block}
{block name=title}Modyfikuj mecz{/block}
{block name=body}
  <input type="hidden" id="id" name="id" value="{if isset($data['id'])}{$data['id']}{/if}">
  {include file="../Mecz/meczForm.html.tpl"}
{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Modyfikuj</button>{/block}
