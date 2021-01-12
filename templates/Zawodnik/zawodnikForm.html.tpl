<div class="form-group has-feedback">
  <label for="imie">Imię</label>
  <input class="form-control" id="imie" name="imie" value="{if isset($data['Imie'])}{$data['Imie']}{/if}"
    type="text"
    data-minlength="2"
    maxlength="40"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 2 znaki"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="nazwisko">Nazwisko</label>
  <input class="form-control" id="nazwisko" name="nazwisko" value="{if isset($data['Nazwisko'])}{$data['Nazwisko']}{/if}"
    type="text"
    data-minlength="2"
    maxlength="50"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 2 znaki"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="opis">Opis</label>
  <input class="form-control" id="opis" name="opis" value="{if isset($data['Opis'])}{$data['Opis']}{/if}"
    type="text"
    maaxlength='150'>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  <label for="idk">Klub</label>
  {if isset($data['IdK'])}
    {html_options name=idk options=$clubs class="form-control" selected=$data['IdK']}
  {else}
    {html_options name=idk options=$clubs class="form-control"}
  {/if}

  <div class="help-block with-errors"></div>
</div>
