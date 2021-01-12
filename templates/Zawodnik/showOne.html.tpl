{extends file="../baseTemplate.html.tpl"}

{block name=title}Szczegółowe informacje o zawodniku{/block}

{block name=body}
<div class="row">
  <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>{$data['Imie']} {$data['Nazwisko']}</h3>
        <p>Klub: {$clubs[$data['IdK']]['Nazwa']}</p>
        <p>Opis: {$data['Opis']}</p>
        <p class="text-right">
          <button type="button" class="btn btn-warning edit-button"
            data-url="zawodnik/mod/{$data['id']}"
            data-toggle="tooltip" data-placement="top" title="Modyfikuj zawodnika">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modyfikuj zawodnika
          </button>
          <a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}zawodnik/statystyki/{$row['id']}" type="button" class="btn btn-info btn-sm"
          data-toggle="tooltip" data-placement="top" title="Pokaż statystyki">
            <span class="glyphicon glyphicon glyphicon-italic" aria-hidden="true"></span>
            Wyświetl statystyki
          </a>
          <button type="button" class="btn btn-danger btn-sm delete-button"
                data-url="zawodnik/usun/{$data['id']}/"
                data-description="{$data['Imie']} {$data['Nazwisko']}"
                data-toggle="tooltip" data-placement="top" title="Usuń zawodnika">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Usuń zawodnika
          </button>
        </p>
      </div>
    </div>
  </div>
</div>
{/block}


{block name=footer prepend}
{include file='../modals/deleteConfirmBlock.html.tpl'}
{/block}
