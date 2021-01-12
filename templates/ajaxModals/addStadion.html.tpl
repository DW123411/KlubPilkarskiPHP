{extends file="../modals/formBlock.html.tpl"}
{block name=action}stadion/dodaj/{/block}
{block name=title}Nowy stadion{/block}
{block name=body}{include file="../Stadion/stadionForm.html.tpl"}{/block}
{block name=acceptButton}<button type="submit" class="btn btn-success">Dodaj</button>{/block}
