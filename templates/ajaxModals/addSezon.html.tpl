{extends file="../modals/formBlock.html.tpl"}
{block name=action}sezon/dodaj/{/block}
{block name=title}Nowy sezon{/block}
{block name=body}{include file="../Sezon/sezonForm.html.tpl"}{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Dodaj</button>{/block}
