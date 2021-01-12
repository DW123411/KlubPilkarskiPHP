{extends file="./baseTemplate.html.tpl"}
{block name=body}
{if isset($data)}
    {block name=checkableFormHeader}{/block}
    <!-- BEGIN TABLE WITH DATA -->
    <table id="datatable" class="display table table-striped" cellspacing="0" width="100%">
        <thead><tr>
    				{block name=thead}
    				<th></th>
    				{/block}
        </tr></thead>
    		<tfoot><tr>
    					{block name=tfoot}
    				  <th></th>
    					{/block}
    	  </tr></tfoot>
        <tbody>
          {foreach $data as $key => $row}
    			<tr {if isset($row['noSelectable']) && $row['noSelectable'] === true}class="noSelectable"{/if}>
    				{block name=tbody}
    				<th></th>
    				{/block}
    			</tr>
          {/foreach}
        </tbody>
      </table><!-- END TABLE WITH DATA -->
      {block name=checkableFormFooter}{/block}
  {/if}
{/block}

{block name=footer prepend}
{include file='./modals/deleteConfirmBlock.html.tpl'}
{/block}