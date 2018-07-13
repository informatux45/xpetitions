<{ * Affichage des signatures et infos d'une pétition * }>

<{if $block.xpetitions_title}>
    <div class="xpetitions_block_title_u">
        <{$smarty.const._MB_XPETITIONS_TITLE}>
    </div>
    <div class="xpetitions_block_title">
        <{$block.xpetitions_title}>
    </div>
<{/if}>

<{if $block.xpetitions_online}>
    <div class="xpetitions_block_title_u">
        <{$smarty.const._MB_XPETITIONS_ONLINE}>
    </div>
    <div class="xpetitions_block_title">
        <{$block.xpetitions_online}>
    </div>
<{/if}>

<{if $block.xpetitions_recorded}>
    <div class="xpetitions_block_title_u">
        <{$smarty.const._MB_XPETITIONS_RECORDED}>
    </div>
    <div class="xpetitions_block_title">
        <{$block.xpetitions_recorded}>
    </div>
<{/if}>

<ul>
    <{if $block.signatures.none}>
        <li><{$block.signatures.none}></li>
    <{else}>
        <{foreach item=signatures from=$block.signatures}>
            <li>
                <{$signatures.name}>&nbsp;
                <{$signatures.prenom}>
                <br>
                <{if $signatures.date}>
                    (<{$signatures.date}>)
                <{/if}>
            </li>
        <{/foreach}>
    <{/if}>
</ul>
