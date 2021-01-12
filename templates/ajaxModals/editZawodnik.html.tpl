{extends file="../modals/formBlock.html.tpl"}
{block name=action}zawodnik/modyfikuj/{/block}
{block name=title}Modyfikuj zawodnika{/block}
{block name=body}
  <input type="hidden" id="id" name="id" value="{if isset($data['id'])}{$data['id']}{/if}">
  {include file="../Zawodnik/zawodnikForm.html.tpl"}
{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Modyfikuj</button>{/block}
