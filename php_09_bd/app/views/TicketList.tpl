{extends file="main.tpl"}

{block name=top}

<h1 class="text-center" style="text-align: center; margin-top: 20px;">Lista zgłoszeń</h1>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <!-- Dodaj nowe zgłoszenie -->
    <div>
        <a class="button special large" href="{$conf->action_root}ticketNew" style="font-size: 1.1rem;">Dodaj nowe zgłoszenie</a>
    </div>

    <!-- Formularz filtrujący -->
    <form class="form-inline" action="{$conf->action_root}ticketList" method="post" style="display: flex; gap: 10px; align-items: center;">
        <input type="text" class="form-control form-control-sm" placeholder="Tytuł zgłoszenia" name="sf_title" value="{$searchForm->title}" style="max-width: 200px;" />
        <button type="submit" class="button small primary" style="font-size: 0.8rem;">Filtruj</button>
    </form>
</div>

<!-- Tabela zgłoszeń -->
<div class="table-wrapper">
    <table class="alt">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tytuł</th>
                <th>Opis</th>
                <th>Data utworzenia</th>
                <th>Utworzone przez</th>
                <th>Data modyfikacji</th>
                <th>Zmodyfikowane przez</th>
                <th>Status</th>
                <th>Opcje</th>
            </tr>
        </thead>
        <tbody>
            {foreach $tickets as $t}
            <tr>
                <td>{$t["idTicket"]}</td>
                <td>{$t["title"]}</td>
                <td>{$t["description"]|truncate:50:"...":true}</td>
                <td>{$t["createdAt"]}</td>
                <td>{$t["createdBy"]}</td>
                <td>
                    {if $t["createdAt"] == $t["modifiedAt"]}
                        Brak
                    {elseif $t["modifiedAt"]}
                        {$t["modifiedAt"]}
                    {else}
                        Brak
                    {/if}
                </td>
                <td>
                    {if $t["createdAt"] == $t["modifiedAt"]}
                        Brak
                    {elseif $t["modifiedBy"]}
                        {$t["modifiedBy"]}
                    {else}
                        Brak
                    {/if}
                </td>
                <td>{$t["status"]}</td>
                <td>
                    <a class="button small" href="{$conf->action_root}ticketEdit/{$t['idTicket']}">Wyświetl</a>
                </td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>

{/block}
