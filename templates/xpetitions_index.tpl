<{include file='db:xpetitions_header.tpl'}>

<div class="xpetitions">
    <div class="xpetitions_home"><{$home_petitions_active}></div>
    <ul class="xpetitions_liste">
        <{if $no_petition_active}>
            <li><{$no_petition_active}></li>
        <{else}>

            <{foreach item=petition from=$petitions}>
                <li>
                    <{$petition.title}>
                    <{if $petition.counter}>
                        &nbsp;&nbsp;(<{$petition.counter}>&nbsp;<{$smarty.const._MD_XPETITIONS_SIGNATURES}>)
                    <{/if}>
                </li>
            <{/foreach}>
        <{/if}>
    </ul>

    <{if $home_petitions_archive}>
        <div class="xpetitions_home"><{$home_petitions_archive}></div>
        <ul class="xpetitions_liste">
            <{if $no_petition_archive}>
                <li><{$no_petition_archive}></li>
            <{else}>

                <{foreach item=petition from=$petitions_arch}>
                    <li>
                        <{$petition.title}>
                        <{if $petition.counter}>
                            &nbsp;&nbsp;(<{$petition.counter}>&nbsp;<{$smarty.const._MD_XPETITIONS_SIGNATURES}>)
                        <{/if}>
                    </li>
                <{/foreach}>
            <{/if}>
        </ul>
    <{/if}>

</div>

<{include file='db:xpetitions_footer.tpl'}>
