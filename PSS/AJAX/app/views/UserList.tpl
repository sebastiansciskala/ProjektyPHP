{extends file="main.tpl"}

{block name=top}

<form id="search-form" class="pure-form pure-form-stacked" onsubmit="ajaxPostForm('search-form','{$conf->action_root}userListPart','table'); return false;" style="display: flex; justify-content: flex-end;">

    <fieldset>
        <input type="text" placeholder="Nazwa użytkownika" name="sf_username" value="{$searchForm->username}" style="max-width: 300px;" /><br />
        <button type="submit" class="pure-button pure-button-primary">Filtruj</button>
    </fieldset>
</form>

{/block}

{block name=bottom}

<div class="bottom-margin">
    <a class="button small primary" style="font-size: 0.9rem;" href="{$conf->action_root}userNew">Dodaj nowego użytkownika</a>
    <a class="button special large" style="font-size: 0.9rem;" href="{$conf->action_root}roleList">Aktywność ról</a>
</div>
<div id="table">
{include file="UserListTable.tpl"}
</div>


{/block}
