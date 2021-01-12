{extends file="../modals/formBlock.html.tpl"}
{block name=action}kategoria/dodaj/{/block}
{block name=title}Nowa kategoria{/block}
{block name=body}{include file="../Category/categoryForm.html.tpl"}{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Dodaj</button>{/block}
