{extends file="../modals/formBlock.html.tpl"}
{block name=action}sedzia/modyfikuj/{/block}
{block name=title}Modyfikuj sędziego{/block}
{block name=body}
  <input type="hidden" id="id" name="id" value="{if isset($data['id'])}{$data['id']}{/if}">
  {include file="../Sedzia/sedziaForm.html.tpl"}
{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Modyfikuj</button>{/block}
