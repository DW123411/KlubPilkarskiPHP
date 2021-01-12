{extends file="../tableTemplate.html.tpl"}

{block name=title}Lista sezonów{/block}

{block name=checkableFormHeader}
<div  style="padding-bottom: 50px"><span class="btn-group pull-right">
  {block name=groupAction prepend}
      <button type="button" class="btn btn-primary add-button"
            data-url="sezon/formularz/"
            data-toggle="tooltip" data-placement="top" title="Dodaj sezon">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Dodaj sezon
      </button>
  {/block}
</span></div>
{/block}


{block name=thead}
  <th>Id</th>
  <th>Sezon</th>
  <th class="hidden-print"></th>
{/block}
{block name=tfoot}
  <th class="searchable">Id</th>
  <th class="searchable">Sezon</th>
  <th></th>
{/block}
{block name=tbody}
  <td>{$row['id']}</td>
  <td>{$row['RokOd']}/{$row['RokDo']}</td>
  <td><span class="btn-group pull-right">
    <button type="button" class="btn btn-warning btn-sm edit-button"
          data-url="sezon/mod/{$row['id']}"
          data-toggle="tooltip" data-placement="top" title="Modyfikuj sezon">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
    </button>
    <a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}mecz/sezon/{$row['id']}/" type="button" class="btn btn-primary btn-sm"
        data-toggle="tooltip" data-placement="top" title="Pokaż wszystkie mecze w sezonie">
        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
    </a>
    <button type="button" class="btn btn-danger btn-sm delete-button"
          data-url="sezon/usun/{$row['id']}/"
          data-description="{$row['RokOd']}/{$row['RokDo']}"
          data-toggle="tooltip" data-placement="top" title="Usuń sezon">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    </button>
  </span></td>
{/block}

{block name=footer prepend}
{include file='../modals/deleteConfirmBlock.html.tpl'}
{/block}