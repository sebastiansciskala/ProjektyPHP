<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta charset="utf-8" />
    <title>Aplikacja bazodanowa</title>
    <link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
</head>

<body>

<header id="header" class="alt">
    <nav>
        <ul style="display: flex; justify-content: flex-end; list-style: none; padding: 0; margin: 0;">
            <li style="margin-left: 20px;">
                <a href="{$conf->action_root}ticketList" class="icon solid fa-clipboard-list" style="color: #333; font-weight: bold; text-decoration: none;">Zgłoszenia</a>
            </li>
            <li style="margin-left: 20px;">
                <a href="{$conf->action_root}userList" class="icon solid fa-users" style="color: #333; font-weight: bold; text-decoration: none;">Lista użytkowników</a>
            </li>
            {if count($conf->roles) > 0}
            <li style="margin-left: 20px;">
                <a href="{$conf->action_root}logout" class="icon solid fa-sign-out-alt" style="color: #333; font-weight: bold; text-decoration: none;">Wyloguj</a>
            </li>
            {else}
            <li style="margin-left: 20px;">
                <a href="{$conf->action_root}loginShow" class="icon solid fa-sign-in-alt" style="color: #333; font-weight: bold; text-decoration: none;">Zaloguj</a>
            </li>
            {/if}
        </ul>
    </nav>
</header>

<section id="main" class="wrapper">
    <div class="inner">
        {block name=top}{/block}
        {block name=messages}
        {if $msgs->isMessage()}
        <div class="box">
            <ul>
                {foreach $msgs->getMessages() as $msg}
                <li class="{if $msg->isError()}error{elseif $msg->isWarning()}warning{else}info{/if}">
                    {$msg->text}
                </li>
                {/foreach}
            </ul>
        </div>
        {/if}
        {/block}
        {block name=bottom}{/block}
    </div>
</section>

<script src="{$conf->app_url}/assets/js/jquery.min.js"></script>
<script src="{$conf->app_url}/assets/js/main.js"></script>

</body>
</html>
