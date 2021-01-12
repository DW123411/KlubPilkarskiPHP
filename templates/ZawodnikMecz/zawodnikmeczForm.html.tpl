<div class="form-group">
  <label for="idm">Mecz</label>
  {if isset($data['IdM'])}
    {html_options name=idm options=$matches class="form-control" selected=$data['IdM']}
  {else}
    {html_options name=idm options=$matches class="form-control"}
  {/if}

  <div class="help-block with-errors"></div>
</div>
<div class="form-group">
  <label for="idz">Zawodnik</label>
  {if isset($data['IdZ'])}
    {html_options name=idz options=$players class="form-control" selected=$data['IdZ']}
  {else}
    {html_options name=idz options=$players class="form-control"}
  {/if}

  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="pozycja">Pozycja</label>
  <input class="form-control" id="pozycja" name="pozycja" value="{if isset($data['Pozycja'])}{$data['Pozycja']}{/if}"
    type="text"
    data-minlength="1"
    maxlength="3"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 1 znak"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="minutyod">Minuty od</label>
  <input class="form-control" id="minutyod" name="minutyod" value="{if isset($data['MinutyOd'])}{$data['MinutyOd']}{/if}"
    type="text"
    data-minlength="1"
    maxlength="3"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 1 znak"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="minutydo">Minuty do</label>
  <input class="form-control" id="minutydo" name="minutydo" value="{if isset($data['MinutyDo'])}{$data['MinutyDo']}{/if}"
    type="text"
    data-minlength="1"
    maxlength="3"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 1 znak"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="bramki">Bramki</label>
  <input class="form-control" id="bramki" name="bramki" value="{if isset($data['Bramki'])}{$data['Bramki']}{/if}"
    type="text"
    data-minlength="1"
    maxlength="2"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 1 znak"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="asysty">Asysty</label>
  <input class="form-control" id="asysty" name="asysty" value="{if isset($data['Asysty'])}{$data['Asysty']}{/if}"
    type="text"
    data-minlength="1"
    maxlength="2"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 1 znak"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="kartkizolte">Kartki żółte</label>
  <input class="form-control" id="kartkizolte" name="kartkizolte" value="{if isset($data['KartkiZolte'])}{$data['KartkiZolte']}{/if}"
    type="text"
    data-minlength="1"
    maxlength="1"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 1 znak"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="kartkiczerwone">Kartki czerwone</label>
  <input class="form-control" id="kartkiczerwone" name="kartkiczerwone" value="{if isset($data['KartkiCzerwone'])}{$data['KartkiCzerwone']}{/if}"
    type="text"
    data-minlength="1"
    maxlength="1"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 1 znak"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="podaniaudane">Podania udane</label>
  <input class="form-control" id="podaniaudane" name="podaniaudane" value="{if isset($data['PodaniaUdane'])}{$data['PodaniaUdane']}{/if}"
    type="text"
    data-minlength="1"
    maxlength="3"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 1 znak"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
<div class="form-group has-feedback">
  <label for="podanianieudane">Podania nieudane</label>
  <input class="form-control" id="podanianieudane" name="podanianieudane" value="{if isset($data['PodaniaNieudane'])}{$data['PodaniaNieudane']}{/if}"
    type="text"
    data-minlength="1"
    maxlength="3"
    data-required-error="Pole wymagane"
    data-minlength-error="Minimalna długość to 1 znak"
    required>
  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
  <div class="help-block with-errors"></div>
</div>
