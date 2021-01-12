{extends file="./base.html.tpl"}
{block name=id}delete-confirm-modal{/block}
{block name=title}Usuwanie danych{/block}
{block name=content}
{include file='./formBlock.html.tpl'}
{/block}
{block name=acceptButton}
  <button type="submit" class="btn btn-danger">Usuń</button>
{/block}
