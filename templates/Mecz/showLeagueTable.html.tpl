{extends file="./showAll.html.tpl"}

{$id = 1}

{block name=title}Tabela ligowa {$seasons[$selectedSeason]['RokOd']}/{$seasons[$selectedSeason]['RokDo']}{/block}

{block name=groupAction}{/block}

{block name=thead}
  <th class="hidden-print"></th>
  <th>Klub</th>
  <th>Punkty</th>
  <th>Bramki zdobyte/stracone</th>
  <th>Bilans bramkowy</th>
{/block}
{block name=tfoot}
  <th></th>
  <th class="searchable">Klub</th>
  <th>Punkty</th>
  <th>Bramki zdobyte/stracone</th>
  <th>Bilans bramkowy</th>
{/block}
{block name=tbody}
  <td>{$id++}</td>
  <td>{$row['Klub']}</td>
  <td>{$row['Punkty']}</td>
  <td>{$row['BramkiZdobyte']}:{$row['BramkiStracone']}</td>
  <td>{$row['BilansBramkowy']}</td>
{/block}
