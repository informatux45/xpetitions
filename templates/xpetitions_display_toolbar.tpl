<div class="xpetitions_sign">
    <{if $link_sign_online == ''}>
        <{$petition_sign_online}>&nbsp;-&nbsp;
    <{else}>
        <a href="<{$xoops_url}><{$link_sign_online}>"><{$petition_sign_online}></a>
        &nbsp;-&nbsp;
    <{/if}>
    <{if $link_sign_offline == ''}>

    <{else}>
        <a href="<{$xoops_url}><{$link_sign_offline}>"><{$petition_sign_offline}></a>
        &nbsp;-&nbsp;
    <{/if}>
    <{if $link_sign_friend == ''}>

    <{else}>
        <a href="<{$xoops_url}><{$link_sign_friend}>"><{$petition_sign_friend}></a>
    <{/if}>

    <{if $whoview_group == 1 || $whoview_group == 2 && $xoops_isuser || $whoview_group == 3 && $xoops_isadmin}>
        &nbsp;-&nbsp;
        <a href="<{$xoops_url}><{$link_sign_show}>"><{$petition_sign_show}></a>
    <{/if}>
</div>
