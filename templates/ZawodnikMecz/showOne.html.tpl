{extends file="../baseTemplate.html.tpl"}

{block name=title}Szczegółowe informacje o występie zawodnika{/block}

{block name=body}
<div class="row">
  <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>{$players[$data['IdZ']]['Imie']} {$players[$data['IdZ']]['Nazwisko']}</h3>
        <p>Mecz: {$clubs[$matches[$data['IdM']]['IdKlubGospodarze']]['Nazwa']} - {$clubs[$matches[$data['IdM']]['IdKlubGoscie']]['Nazwa']}</p>
        <p>Data: {$matches[$data['IdM']]['Data']}</p>
        <p>Pozycja: {$data['Pozycja']}</p>
        <p>Czas gry: {$data['MinutyOd']}-{$data['MinutyDo']}</p>
        <p>Bramki: {$data['Bramki']}</p>
        <p>Asysty: {$data['Asysty']}</p>
        <p>Kartki żółte: {$data['KartkiZolte']}</p>
        <p>Kartki czerwone: {$data['KartkiCzerwone']}</p>
        <p>Podania udane/nieudane: {$data['PodaniaUdane']}/{$data['PodaniaNieudane']}</p>
        <p class="text-right">
          <button type="button" class="btn btn-warning edit-button"
              data-url="zawodnikmecz/mod/{$data['id']}"
              data-toggle="tooltip" data-placement="top" title="Modyfikuj występ zawodnika w meczu">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modyfikuj występ zawodnika w meczu
          </button>
          <button type="button" class="btn btn-danger btn-sm delete-button"
                data-url="zawodnikmecz/usun/{$data['id']}/"
                data-description="{$clubs[$matches[$data['IdM']]['IdKlubGospodarze']]['Nazwa']} - {$clubs[$matches[$data['IdM']]['IdKlubGoscie']]['Nazwa']}"
                data-toggle="tooltip" data-placement="top" title="Usuń występ zawodnika w meczu">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Usuń występ zawodnika w meczu
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
