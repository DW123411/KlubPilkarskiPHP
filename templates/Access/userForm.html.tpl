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
