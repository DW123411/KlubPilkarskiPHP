{extends file="../baseTemplate.html.tpl"}

{block name=title}Szczegółowe informacje o stadionie{/block}

{block name=body}
<div class="row">
  <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
    <div class="thumbnail">
      <div class="caption">
        <h3>{$data['Miejscowosc']} - {$data['Nazwa']}</h3>
        <p>Pojemność: {$data['Pojemnosc']}</p>
        <p class="text-right">
          <button type="button" class="btn btn-warning edit-button"
              data-url="stadion/mod/{$data['id']}"
              data-toggle="tooltip" data-placement="top" title="Modyfikuj stadion">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Modyfikuj stadion
          </button>
          <button type="button" class="btn btn-danger btn-sm delete-button"
                data-url="stadion/usun/{$data['id']}/"
                data-description="{$data['Miejscowosc']} - {$data['Nazwa']}"
                data-toggle="tooltip" data-placement="top" title="Usuń stadion">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Usuń stadion
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
