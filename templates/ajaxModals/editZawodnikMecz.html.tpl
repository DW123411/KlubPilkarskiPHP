{extends file="../modals/formBlock.html.tpl"}
{block name=action}zawodnikmecz/modyfikuj/{/block}
{block name=title}Modyfikuj występ zawodnika w meczu{/block}
{block name=body}
  <input type="hidden" id="id" name="id" value="{if isset($data['id'])}{$data['id']}{/if}">
  {include file="../ZawodnikMecz/zawodnikmeczForm.html.tpl"}
{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Modyfikuj</button>{/block}
