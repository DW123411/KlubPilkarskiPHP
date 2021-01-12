<div class="form-group has-feedback">
  <label for="siedziba">Siedziba</label>
  <input class="form-control" id="siedziba" name="siedziba" value="{if isset($data['Siedziba'])}{$data['Siedziba']}{/if}"
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
  <label for="nazwa">Nazwa klubu</label>
  <input class="form-control" id="nazwa" name="nazwa" value="{if isset($data['Nazwa'])}{$data['Nazwa']}{/if}"
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
  <label for="opis">Opis</label>
  <input class="form-control" id="opis" name="opis" value="{if isset($data['Opis'])}{$data['Opis']}{/if}"
    type="text"
    maaxlength='150'>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  <label for="idt">Trener</label>
  {if isset($data['IdT'])}
    {html_options name=idt options=$coaches class="form-control" selected=$data['IdT']}
  {else}
    {html_options name=idt options=$coaches class="form-control"}
  {/if}

  <div class="help-block with-errors"></div>
</div>
