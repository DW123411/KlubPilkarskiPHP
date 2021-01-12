{extends file="../modals/formBlock.html.tpl"}
{block name=action}trener/dodaj/{/block}
{block name=title}Nowy trener{/block}
{block name=body}{include file="../Trener/trenerForm.html.tpl"}{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Dodaj</button>{/block}
