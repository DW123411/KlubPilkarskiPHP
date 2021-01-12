{extends file="../tableTemplate.html.tpl"}

{block name=title}Lista występów zawodników w meczach{/block}

{block name=checkableFormHeader}
<div  style="padding-bottom: 50px"><span class="btn-group pull-right">
  {block name=groupAction prepend}
      <button type="button" class="btn btn-primary add-button"
            data-url="zawodnikmecz/formularz/"
            data-toggle="tooltip" data-placement="top" title="Dodaj występ zawodnika w meczu">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Dodaj występ zawodnika w meczu
      </button>
  {/block}
</span></div>
{/block}


{block name=thead}
  <th>Data</th>
  <th>Mecz</th>
  <th>Zawodnik</th>
  <th class="hidden-print"></th>
{/block}
{block name=tfoot}
  <th class="searchable">Data</th>
  <th class="searchable">Mecz</th>
  <th class="searchable">Zawodnik</th>
  <th></th>
{/block}
{block name=tbody}
  <td>{$matches[$row['IdM']]['Data']}</td>
  <td>{$clubs[$matches[$row['IdM']]['IdKlubGospodarze']]['Nazwa']} - {$clubs[$matches[$row['IdM']]['IdKlubGoscie']]['Nazwa']}</td>
  <td>{$players[$row['IdZ']]['Imie']} {$players[$row['IdZ']]['Nazwisko']}</td>
  <td><span class="btn-group pull-right">
    <a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}zawodnikmecz/{$row['id']}" type="button" class="btn btn-primary btn-sm"
        data-toggle="tooltip" data-placement="top" title="Pokaż szczegółowe informacje">
        <span class="glyphicon glyphicon glyphicon-file" aria-hidden="true"></span>
    </a>
    <button type="button" class="btn btn-danger btn-sm delete-button"
          data-url="zawodnikmecz/usun/{$row['id']}/"
          data-description="{$clubs[$matches[$row['IdM']]['IdKlubGospodarze']]['Nazwa']} - {$clubs[$matches[$row['IdM']]['IdKlubGoscie']]['Nazwa']}"
          data-toggle="tooltip" data-placement="top" title="Usuń występ zawodnika w meczu">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    </button>
  </span></td>
{/block}

{block name=footer prepend}
{include file='../modals/deleteConfirmBlock.html.tpl'}
{/block}