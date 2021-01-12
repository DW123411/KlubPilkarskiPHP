{extends file="../baseTemplate.html.tpl"}

{block name=title}Szczegółowe informacje o meczu{/block}

{block name=body}
<div class="row">
  <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>{$clubs[$data['IdKlubGospodarze']]['Nazwa']} - {$clubs[$data['IdKlubGoscie']]['Nazwa']} {$data['BramkiGospodarze']}:{$data['BramkiGoscie']}</h3>
        <p>Sezon: {$seasons[$data['IdS']]['RokOd']}/{$seasons[$data['IdS']]['RokDo']}</p>
        <p>Data: {$data['Data']}</p>
        <p>Stadion: {$stadiums[$data['IdStadion']]['Nazwa']} - {$stadiums[$data['IdStadion']]['Miejscowosc']}</p>
        <p>Punkty gospodarzy: {$data['PunktyGospodarze']}</p>
        <p>Punkty gości: {$data['PunktyGoscie']}</p>
        <p>Opis: {$data['Opis']}</p>
        <p>Sędzia: {$referees[$data['IdSedzia']]['Imie']} {$referees[$data['IdSedzia']]['Nazwisko']}</p>
        <p>Ilość kibiców: {$data['Kibice']}</p>
        <p class="text-right">
          <button type="button" class="btn btn-warning edit-button"
              data-url="mecz/mod/{$data['id']}"
              data-toggle="tooltip" data-placement="top" title="Modyfikuj mecz">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modyfikuj mecz
          </button>
          <button type="button" class="btn btn-danger btn-sm delete-button"
                data-url="mecz/usun/{$data['id']}/"
                data-description="{$clubs[$data['IdKlubGospodarze']]['Nazwa']} - {$clubs[$data['IdKlubGoscie']]['Nazwa']}"
                data-toggle="tooltip" data-placement="top" title="Usuń mecz">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Usuń mecz
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
