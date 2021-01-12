{extends file="../tableTemplate.html.tpl"}

{block name=title}Lista zawodników{/block}

{block name=checkableFormHeader}
<div  style="padding-bottom: 50px"><span class="btn-group pull-right">
  {block name=groupAction prepend}
      <button type="button" class="btn btn-primary add-button"
            data-url="zawodnik/formularz/"
            data-toggle="tooltip" data-placement="top" title="Dodaj zawodnika">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Dodaj zawodnika
      </button>
  {/block}
</span></div>
{/block}

{block name=thead}
  <th>Imie</th>
  <th>Nazwisko</th>
  <th class="hidden-print"></th>
{/block}
{block name=tfoot}
  <th class="searchable">Imie</th>
  <th class="searchable">Nazwisko</th>
  <th></th>
{/block}
{block name=tbody}
  <td>{$row['Imie']}</td>
  <td>{$row['Nazwisko']}</td>
  <td><span class="btn-group pull-right">
    <a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}zawodnik/{$row['id']}" type="button" class="btn btn-primary btn-sm"
        data-toggle="tooltip" data-placement="top" title="Pokaż szczegółowe informacje">
        <span class="glyphicon glyphicon glyphicon-file" aria-hidden="true"></span>
    </a>
    <a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}zawodnik/statystyki/{$row['id']}" type="button" class="btn btn-info btn-sm"
        data-toggle="tooltip" data-placement="top" title="Pokaż statystyki">
        <span class="glyphicon glyphicon glyphicon-italic" aria-hidden="true"></span>
    </a>
    <button type="button" class="btn btn-danger btn-sm delete-button"
          data-url="zawodnik/usun/{$row['id']}/"
          data-description="{$row['Imie']} {$row['Nazwisko']}"
          data-toggle="tooltip" data-placement="top" title="Usuń zawodnika">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    </button>
  </span></td>
{/block}

{block name=footer prepend}
{include file='../modals/deleteConfirmBlock.html.tpl'}
{/block}