{extends file="../baseTemplate.html.tpl"}

{block name=title}Statystyki zawodnika{/block}

{block name=body}
<div class="row">
  <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
    <div class="thumbnail">
      <div class="caption">
        {if isset($data[0]['Imie'])}
        <h3>{$data[0]['Imie']} {$data[0]['Nazwisko']}</h3>
        <p>Klub: {$data[0]['Klub']}</p>
        <p>Suma bramek: {$data[0]['SumaBramek']}</p>
        <p>Suma asyst: {$data[0]['SumaAsyst']}</p>
        <p>Procent udanych podań: {(($data[0]['SumaPodanUdanych']/($data[0]['SumaPodanNieudanych']+$data[0]['SumaPodanUdanych']))*100)|number_format:2:'.':','}%</p>
        <p>Suma żółtych kartek: {$data[0]['SumaKartekZoltych']}</p>
        <p>Suma czerwonych kartek: {$data[0]['SumaKartekCzerwonych']}</p>
        <p class="text-right">
        </p>
        {else}
          <h3>Brak danych</h3>
        {/if}
      </div>
    </div>
  </div>
</div>
{/block}


{block name=footer prepend}
{include file='../modals/deleteConfirmBlock.html.tpl'}
{/block}
