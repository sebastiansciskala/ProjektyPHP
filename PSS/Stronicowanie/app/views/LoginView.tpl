{extends file="main.tpl"}

{block name=top}
<div id="wrapper">
    <!-- Header -->
    <header id="header">
        <div class="inner">
            <a href="{$conf->action_root}" class="logo">
                <span class="symbol"><img src="{$conf->app_url}/images/logo.svg" alt="" /></span>
                <span class="title">Ticket Manager</span>
            </a>
        </div>
    </header>

    <!-- Main -->
    <div id="main" style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">
        <div class="inner">
            <section>
                <h2 class="text-center">Logowanie</h2>
                <form action="{$conf->action_root}login" method="post" class="pure-form pure-form-aligned" 
                      style="border: 1px solid #ddd; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background: #fff;">
                    <fieldset>
                        <div class="pure-control-group">
                            <label for="id_login">Login:</label>
                            <input id="id_login" type="text" name="login" value="{$form->login}" style="width: 100%; padding: 10px;" />
                        </div>
                        <div class="pure-control-group">
                            <label for="id_pass">Hasło:</label>
                            <input id="id_pass" type="password" name="pass" style="width: 100%; padding: 10px;" />
                        </div>
                        <div class="pure-controls">
                            <input type="submit" value="Zaloguj" class="button primary" style="width: 100%;" />
                        </div>
                    </fieldset>
                </form>
            </section>
        </div>
    </div>
    

</div>
{/block}
