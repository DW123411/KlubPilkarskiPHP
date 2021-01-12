{extends file="../tableTemplate.html.tpl"}

{block name=title}Lista stadionów{/block}

{block name=checkableFormHeader}
<div  style="padding-bottom: 50px"><span class="btn-group pull-right">
  {block name=groupAction prepend}
      <button type="button" class="btn btn-primary add-button"
            data-url="stadion/formularz/"
            data-toggle="tooltip" data-placement="top" title="Dodaj stadion">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Dodaj stadion
      </button>
  {/block}
</span></div>
{/block}


{block name=thead}
  <th>Miejscowość</th>
  <th>Nazwa</th>
  <th class="hidden-print"></th>
{/block}
{block name=tfoot}
  <th class="searchable">Miejscowość</th>
  <th class="searchable">Nazwa</th>
  <th></th>
{/block}
{block name=tbody}
  <td>{$row['Miejscowosc']}</td>
  <td>{$row['Nazwa']}</td>
  <td><span class="btn-group pull-right">
    <a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}stadion/{$row['id']}" type="button" class="btn btn-primary btn-sm"
        data-toggle="tooltip" data-placement="top" title="Pokaż szczegółowe informacje">
        <span class="glyphicon glyphicon glyphicon-file" aria-hidden="true"></span>
    </a>
    <button type="button" class="btn btn-danger btn-sm delete-button"
          data-url="stadion/usun/{$row['id']}/"
          data-description="{$row['Miejscowosc']} - {$row['Nazwa']}"
          data-toggle="tooltip" data-placement="top" title="Usuń stadion">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    </button>
  </span></td>
{/block}

{block name=footer prepend}
{include file='../modals/deleteConfirmBlock.html.tpl'}
{/block}