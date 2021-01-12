{extends file="../modals/formBlock.html.tpl"}
{block name=action}mecz/dodaj/{/block}
{block name=title}Nowy mecz{/block}
{block name=body}{include file="../Mecz/meczForm.html.tpl"}{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Dodaj</button>{/block}
