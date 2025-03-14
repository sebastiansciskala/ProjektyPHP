{extends file="main.tpl"}

{block name=top}

<div style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 20px;">
    <!-- Formularz wyszukiwania -->
    <form class="form-inline" action="{$conf->action_url}userList" method="post" style="display: flex; gap: 10px; align-items: center;">
        <input type="text" class="form-control form-control-sm" placeholder="  Nazwa użytkownika" name="sf_username" value="{$searchForm->username}" style="max-width: 200px;">
        <button type="submit" class="button small primary" style="font-size: 0.9rem; text-transform: uppercase;">Filtruj</button>
    </form>
</div>

{/block}

{block name=bottom}

<div class="bottom-margin">
    <a class="button small primary" style="font-size: 0.9rem;" href="{$conf->action_root}userNew">Dodaj nowego użytkownika</a>
    <a class="button special large" style="font-size: 0.9rem;" href="{$conf->action_root}roleList">Aktywność ról</a>
</div>

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

{/block}
