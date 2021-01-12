{extends file="../modals/formBlock.html.tpl"}
{block name=action}sedzia/dodaj/{/block}
{block name=title}Nowy sedzia{/block}
{block name=body}{include file="../Sedzia/sedziaForm.html.tpl"}{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Dodaj</button>{/block}
