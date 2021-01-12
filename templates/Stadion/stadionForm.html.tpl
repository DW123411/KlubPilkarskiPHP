<div class="form-group has-feedback">
  <label for="miejscowosc">Miejscowość</label>
  <input class="form-control" id="miejscowosc" name="miejscowosc" value="{if isset($data['Miejscowosc'])}{$data['Miejscowosc']}{/if}"
    type="text"
    data-minlength="2"
    maxlength="90"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 2 znaki"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="nazwa">Nazwa</label>
  <input class="form-control" id="nazwa" name="nazwa" value="{if isset($data['Nazwa'])}{$data['Nazwa']}{/if}"
    type="text"
    data-minlength="2"
    maxlength="70"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 2 znaki"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="pojemnosc">Pojemność</label>
  <input class="form-control" id="pojemnosc" name="pojemnosc" value="{if isset($data['Pojemnosc'])}{$data['Pojemnosc']}{/if}"
    type="text"
    maxlength="50"
    data-required-error="Pole wymagane"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
