  {if isset($success) && $success|count > 0}
  	<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {foreach $success as $v}
        <p>{$v}</p>
      {/foreach}
    </div>
  {/if}
  {if isset($warning) && $warning|count > 0}
  	<div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {foreach $warning as $v}
        <p>{$v}</p>
      {/foreach}
    </div>
  {/if}
  {if isset($error) && $error|count > 0}
  	<div class="alert alert-wrror alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {foreach $wornig as $v}
        <p>{$v}</p>
      {/foreach}
    </div>
  {/if} 
