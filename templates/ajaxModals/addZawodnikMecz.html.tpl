{extends file="../modals/formBlock.html.tpl"}
{block name=action}zawodnikmecz/dodaj/{/block}
{block name=title}Nowy występ zawodnika w meczu{/block}
{block name=body}{include file="../ZawodnikMecz/zawodnikmeczForm.html.tpl"}{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Dodaj</button>{/block}
