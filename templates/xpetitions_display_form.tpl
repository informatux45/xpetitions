<{include file='db:xpetitions_header.tpl'}>

<{if !$petition_offline}>
    <div class="xpetitions_title"><{$petition_title}><br>
        <{$whoview}>
    </div>
<{else}>
    <div class="xpetitions_offline"><{$petition_offline}></div>
<{/if}>
