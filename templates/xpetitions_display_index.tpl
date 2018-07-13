<{include file='db:xpetitions_header.tpl'}>

<{if !$petition_offline}>
    <div class="xpetitions">

        <div class="xpetitions_title"><{$petition_title}><br>
            <{$whoview}>
            <{if $xoops_isadmin === true}>
                &nbsp;
                <a href="<{$xoops_url}><{$link_adm_modif}>"><img src="<{xoModuleIcons16 edit.png}>"></a>
                &nbsp;
                <a href="<{$xoops_url}><{$link_adm_delete}>"><img src="<{xoModuleIcons16 delete.png}>"></a>
            <{/if}>
        </div>

        <{include file='db:xpetitions_display_toolbar.tpl'}>

        <div class="xpetition_desc">
            <{$petition_desc}>
        </div>

        <{include file='db:xpetitions_display_toolbar.tpl'}>

    </div>
<{else}>
    <div class="xpetitions_offline"><{$petition_offline}></div>
<{/if}>

<{include file='db:xpetitions_footer.tpl'}>
