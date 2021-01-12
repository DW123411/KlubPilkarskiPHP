{extends file="../tableTemplate.html.tpl"}

{block name=title}Lista meczy{/block}

{block name=checkableFormHeader}
<div  style="padding-bottom: 50px"><span class="btn-group pull-right">
  {block name=groupAction prepend}
    <button type="button" class="btn btn-primary add-button"
            data-url="mecz/formularz/"
            data-toggle="tooltip" data-placement="top" title="Dodaj mecz">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Dodaj mecz
    </button>
  {/block}
</span></div>
{/block}


{block name=thead}
  <th>Data</th>
  <th>Mecz</th>
  <th class="hidden-print"></th>
{/block}
{block name=tfoot}
  <th class="searchable">Data</th>
  <th class="searchable">Mecz</th>
  <th></th>
{/block}
{block name=tbody}
  <td>{$row['Data']}</td>
  <td>{$clubs[$row['IdKlubGospodarze']]['Nazwa']} - {$clubs[$row['IdKlubGoscie']]['Nazwa']}</td>
  <td><span class="btn-group pull-right">
    <a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}mecz/{$row['id']}" type="button" class="btn btn-primary btn-sm"
        data-toggle="tooltip" data-placement="top" title="Pokaż szczegółowe informacje">
        <span class="glyphicon glyphicon glyphicon-file" aria-hidden="true"></span>
    </a>
    <button type="button" class="btn btn-danger btn-sm delete-button"
          data-url="mecz/usun/{$row['id']}/"
          data-description="{$clubs[$row['IdKlubGospodarze']]['Nazwa']} - {$clubs[$row['IdKlubGoscie']]['Nazwa']}"
          data-toggle="tooltip" data-placement="top" title="Usuń mecz">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    </button>
  </span></td>
{/block}

{block name=footer prepend}
{include file='../modals/deleteConfirmBlock.html.tpl'}
{/block}