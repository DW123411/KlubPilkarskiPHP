<div class="form-group">
  <label for="ids">Sezon</label>
  {if isset($data['IdS'])}
    {html_options name=ids options=$seasons class="form-control" selected=$data['IdS']}
  {else}
    {html_options name=ids options=$seasons class="form-control"}
  {/if}

  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="data">Data</label>
  <input class="form-control" id="data" name="data" value="{if isset($data['Data'])}{$data['Data']}{/if}"
    type="text"
    maxlength="16"
    data-required-error="Pole wymagane"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  <label for="idstadion">Stadion</label>
  {if isset($data['IdStadion'])}
    {html_options name=idstadion options=$stadiums class="form-control" selected=$data['IdStadion']}
  {else}
    {html_options name=idstadion options=$stadiums class="form-control"}
  {/if}

  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  <label for="idklubgospodarze">Klub gospodarzy</label>
  {if isset($data['IdKlubGospodarze'])}
    {html_options name=idklubgospodarze options=$clubs class="form-control" selected=$data['IdKlubGospodarze']}
  {else}
    {html_options name=idklubgospodarze options=$clubs class="form-control"}
  {/if}

  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  <label for="idklubgoscie">Klub gości</label>
  {if isset($data['IdKlubGoscie'])}
    {html_options name=idklubgoscie options=$clubs class="form-control" selected=$data['IdKlubGoscie']}
  {else}
    {html_options name=idklubgoscie options=$clubs class="form-control"}
  {/if}

  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="bramkigospodarze">Bramki gospodarzy</label>
  <input class="form-control" id="bramkigospodarze" name="bramkigospodarze" value="{if isset($data['BramkiGospodarze'])}{$data['BramkiGospodarze']}{/if}"
    type="text"
    maxlength="50"
    data-required-error="Pole wymagane"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="bramkigoscie">Bramki gości</label>
  <input class="form-control" id="bramkigoscie" name="bramkigoscie" value="{if isset($data['BramkiGoscie'])}{$data['BramkiGoscie']}{/if}"
    type="text"
    maxlength="50"
    data-required-error="Pole wymagane"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="punktygospodarze">Punkty gospodarzy</label>
  <input class="form-control" id="punktygospodarze" name="punktygospodarze" value="{if isset($data['PunktyGospodarze'])}{$data['PunktyGospodarze']}{/if}"
    type="text"
    maxlength="50"
    data-required-error="Pole wymagane"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="punktygoscie">Punkty gości</label>
  <input class="form-control" id="punktygoscie" name="punktygoscie" value="{if isset($data['PunktyGoscie'])}{$data['PunktyGoscie']}{/if}"
    type="text"
    maxlength="50"
    data-required-error="Pole wymagane"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="opis">Opis</label>
  <input class="form-control" id="opis" name="opis" value="{if isset($data['Opis'])}{$data['Opis']}{/if}"
    type="text"
    maaxlength='100'>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  <label for="idsedzia">Sędzia</label>
  {if isset($data['IdSedzia'])}
    {html_options name=idsedzia options=$referees class="form-control" selected=$data['IdSedzia']}
  {else}
    {html_options name=idsedzia options=$referees class="form-control"}
  {/if}

  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="kibice">Ilość kibiców</label>
  <input class="form-control" id="kibice" name="kibice" value="{if isset($data['Kibice'])}{$data['Kibice']}{/if}"
    type="text"
    maxlength="50"
    data-required-error="Pole wymagane"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
