<div class="form-group has-feedback">
  <label for="rokod">Rok Od</label>
  <input class="form-control" id="rokod" name="rokod" value="{if isset($data['RokOd'])}{$data['RokOd']}{/if}"
    type="text"
    data-minlength="4"
    maxlength="4"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 4 znaki"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="rokdo">Rok Do</label>
  <input class="form-control" id="rokdo" name="rokdo" value="{if isset($data['RokDo'])}{$data['RokDo']}{/if}"
    type="text"
    data-minlength="4"
    maxlength="4"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 4 znaki"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
