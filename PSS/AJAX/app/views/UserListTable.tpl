<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
    <tr>
        <th>ID</th>
        <th>Nazwa użytkownika</th>
        <th>Email</th>
        <th>Rola</th>
        <th>Utworzone przez</th>
        <th>Opcje</th>
    </tr>
</thead>
<tbody>
{foreach $people as $p}
<tr>
    <td>{$p["idUser"]}</td>
    <td>{$p["username"]}</td>
    <td>{$p["email"]}</td>
    <td>{$p["roleName"]}</td>
    <td>{$p["createdByUsername"]}</td>
    <td>
        <a class="button special large" style="font-size: 0.82rem;" href="{$conf->action_root}userEdit/{$p['idUser']}">Edytuj</a>
        {if $p["isBlocked"] == 1}
            <a class="button small primary" href="{$conf->action_root}userUnblock/{$p['idUser']}">Odblokuj</a>
        {else}
            <a class="button small primary" href="{$conf->action_root}userBlock/{$p['idUser']}">Zablokuj</a>
        {/if}
    </td>
</tr>
{/foreach}
</tbody>
</table>