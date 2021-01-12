{extends file="../modals/formBlock.html.tpl"}
{block name=action}zawodnik/dodaj/{/block}
{block name=title}Nowy zawodnik{/block}
{block name=body}{include file="../Zawodnik/zawodnikForm.html.tpl"}{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Dodaj</button>{/block}
