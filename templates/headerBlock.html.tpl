<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    {block name=header}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{block name=title}ZPAI{/block}</title>
    {/block}
    {block name=css}
    {if isset($cssFile)}
        {foreach $cssFile as $script}
            <link href="{$protocol}{$smarty.server.HTTP_HOST}{$subdir}css/{$script}" rel="stylesheet">
        {/foreach}
    {/if}
    {/block}
  </head>
  <body>
