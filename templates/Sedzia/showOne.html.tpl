{extends file="../baseTemplate.html.tpl"}

{block name=title}Szczegółowe informacje o sędzim{/block}

{block name=body}
<div class="row">
  <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>{$data['Imie']} {$data['Nazwisko']}</h3>
        <p class="text-right">
          <button type="button" class="btn btn-warning edit-button"
              data-url="sedzia/mod/{$data['id']}"
              data-toggle="tooltip" data-placement="top" title="Modyfikuj sędziego">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modyfikuj sędziego
          </button>
          <button type="button" class="btn btn-danger btn-sm delete-button"
                data-url="sedzia/usun/{$data['id']}/"
                data-description="{$data['Imie']} {$data['Nazwisko']}"
                data-toggle="tooltip" data-placement="top" title="Usuń sędziego">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Usuń sędziego
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
