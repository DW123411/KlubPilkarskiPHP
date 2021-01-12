{extends file="../modals/formBlock.html.tpl"}
{block name=action}klub/dodaj/{/block}
{block name=title}Nowy klub{/block}
{block name=body}{include file="../Klub/klubForm.html.tpl"}{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Dodaj</button>{/block}
