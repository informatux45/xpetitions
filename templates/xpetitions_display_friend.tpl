<{include file='db:xpetitions_header.tpl'}>

<{if !$petition_offline}>
    <div class="xpetitions">

        <div class="xpetitions_title"><{$petition_title}></div>

    </div>
<{else}>
    <div class="xpetitions_offline"><{$petition_offline}></div>
<{/if}>

<{include file='db:xpetitions_footer.tpl'}>
