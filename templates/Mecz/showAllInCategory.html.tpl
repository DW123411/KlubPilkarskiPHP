{extends file="./showAll.html.tpl"}

{block name=title}Lista meczy w sezonie: {$seasons[$selectedSeason]['RokOd']}/{$seasons[$selectedSeason]['RokDo']}{/block}

{block name=groupAction}
<button type="button" class="btn btn-primary add-button"
        data-url="mecz/formularz/"
        data-toggle="tooltip" data-placement="top" title="Dodaj mecz">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Dodaj mecz
</button>
<a href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}mecz/tabela/{$selectedSeason}/" type="button" class="btn btn-info"
        data-toggle="tooltip" data-placement="top" title="Wyświetl tabelę ligową">
 	<span class="glyphicon glyphicon glyphicon-th-list" aria-hidden="true"></span>
    Tabela ligowa
 </a>
 {/block}
