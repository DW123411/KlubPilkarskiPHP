{extends file="./tableTemplate.html.tpl"}

{block name=checkableFormHeader}
<form id="form-datatable" class="checkable" action="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}{block name=action}{/block}" method="POST">
<div  style="padding-bottom: 50px"><span class="btn-group pull-right">
	{block name=groupAction}
		<button type="submit" class="btn btn-warning pull-right edit-button" title="Transferuj zaznaczone">
			{block name=submit}<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Transferuj zaznaczone{/block}
		</button>
	{/block}
</span></div>
{/block}

{block name=checkableFormFooter}
</form>
{/block}
