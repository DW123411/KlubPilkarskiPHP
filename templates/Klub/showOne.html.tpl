{extends file="../baseTemplate.html.tpl"}

{block name=title}Szczegółowe informacje o klubie{/block}

{block name=body}
<div class="row">
  <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>{$data['Nazwa']}</h3>
        <p>Siedziba: {$data['Siedziba']}</p>
        <p>Opis: {$data['Opis']}</p>
        <p>Trener: {$coaches[$data['IdT']]['Imie']} {$coaches[$data['IdT']]['Nazwisko']}</p>
        <p class="text-right">
          <button type="button" class="btn btn-warning edit-button"
              data-url="klub/mod/{$data['id']}"
              data-toggle="tooltip" data-placement="top" title="Modyfikuj klub">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modyfikuj klub
          </button>
          <button type="button" class="btn btn-danger btn-sm delete-button"
                data-url="klub/usun/{$data['id']}/"
                data-description="{$data['Nazwa']}"
                data-toggle="tooltip" data-placement="top" title="Usuń klub">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Usuń klub
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
