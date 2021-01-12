{extends file="./baseTemplate.html.tpl"}

{block name=title}Formularz dodawania{/block}
{block name=body}
<form id="form" class="validate-form" action="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}{block name=action}{/block}" method="post">
  <div class="panel panel-default">
    <div class="panel-body">
      {block name=formBody}{/block}
    </div>
    <div class="panel-footer text-right">
        <button type="submit" class="btn btn-success">{block name=button}Dodaj{/block}</button>
    </div>
  </div>
</form>
{/block}
