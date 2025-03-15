{extends file="main.tpl"}

{block name=top}
<div class="bottom-margin" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
    <form action="{$conf->action_root}ticketSave" method="post" style="display: flex; flex-direction: column; gap: 15px;">
        <fieldset style="border: none; padding: 0; margin: 0;">
            <legend style="font-size: 1.5rem; font-weight: bold; margin-bottom: 20px;">Dodaj/Edytuj zgłoszenie</legend>

            <!-- Pole tytułu -->
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="title" style="font-weight: bold;">Tytuł</label>
                <input id="title" type="text" placeholder="Tytuł zgłoszenia" name="title" value="{$form->title}" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
            </div>

            <!-- Pole opisu -->
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="description" style="font-weight: bold;">Opis</label>
                <textarea id="description" placeholder="Opis zgłoszenia" name="description" rows="5" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">{$form->description}</textarea>
            </div>

            <!-- Pole statusu -->
            {if $form->id}
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <label for="idStatus" style="font-weight: bold;">Status zgłoszenia</label>
                <select id="idStatus" name="idStatus" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
                    {foreach $statuses as $status}
                    <option value="{$status.idStatus}" {if $form->idStatus == $status.idStatus}selected{/if}>{$status.statusName}</option>
                    {/foreach}
                </select>
            </div>
            {/if}

            <!-- Przycisk zapisu i powrotu -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                <button type="submit" class="button small primary" style="font-size: 1rem;">Zapisz</button>
                <a class="button special large"href="{$conf->action_root}ticketList" style="font-size: 1rem;">Powrót</a>
            </div>
        </fieldset>
        <input type="hidden" name="id" value="{$form->id}">
    </form>
</div>
{/block}
