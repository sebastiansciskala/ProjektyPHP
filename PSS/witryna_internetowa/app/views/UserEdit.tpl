{extends file="main.tpl"}

{block name=top}
<div class="bottom-margin" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
    <form action="{$conf->action_root}userSave" method="post" style="display: flex; flex-direction: column; gap: 15px;">
        <fieldset style="border: none; padding: 0; margin: 0;">
            <legend style="font-size: 1.5rem; font-weight: bold; margin-bottom: 20px;">Dane użytkownika</legend>

            <!-- Pole nazwy użytkownika -->
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="username" style="font-weight: bold;">Nazwa użytkownika</label>
                <input id="username" type="text" placeholder="Nazwa użytkownika" name="username" value="{$form->username}" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
            </div>

            <!-- Pole email -->
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="email" style="font-weight: bold;">Email</label>
                <input id="email" type="email" placeholder="Email" name="email" value="{$form->email}" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
            </div>

            <!-- Pole roli -->
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="idRole" style="font-weight: bold;">Rola</label>
                <select id="idRole" name="idRole" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
                    {foreach $roles as $role}
                    <option value="{$role.idRole}" {if $form->idRole == $role.idRole}selected{/if}>{$role.roleName}</option>
                    {/foreach}
                </select>
            </div>

            <!-- Pole hasła -->
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="password" style="font-weight: bold;">Hasło</label>
                <input id="password" type="password" placeholder="Wprowadź hasło" name="password" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
            </div>

            <!-- Przycisk zapisu i powrotu -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                <button type="submit" class="button small primary" style="font-size: 1rem;">Zapisz</button>
                <a href="{$conf->action_root}userList" class="button special large" style="font-size: 1rem;">Powrót</a>
            </div>
        </fieldset>
        <input type="hidden" name="id" value="{$form->id}">
    </form>
</div>
{/block}
