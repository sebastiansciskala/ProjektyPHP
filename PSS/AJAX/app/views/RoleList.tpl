{extends file="main.tpl"}

{block name=top}
<div class="bottom-margin">
    <a class="button special large" href="{$conf->action_root}userList">Powrót do listy użytkowników</a>
</div>

<table class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa roli</th>
            <th>Aktywna</th>
            <th>Opcje</th>
        </tr>
    </thead>
    <tbody>
        {foreach $roles as $role}
        <tr>
            <td>{$role.idRole}</td>
            <td>{$role.roleName}</td>
            <td>{if $role.isActive == 1}Tak{else}Nie{/if}</td>
            <td>
                <a class="button small primary" href="{$conf->action_root}roleToggle/{$role.idRole}">
                    {if $role.isActive == 1}Dezaktywuj{else}Aktywuj{/if}
                </a>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>
{/block}
