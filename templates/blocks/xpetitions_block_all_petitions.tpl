<{ * Affichage de toutes les pétitions à signer * }>

<ul>
    <{if $block.petitions.none}>
        <li><{$block.petitions.none}></li>
    <{else}>
        <{foreach item=petition from=$block.petitions}>
            <li>
                <a href="<{$petition.opt}> <{$petition.link}>"><{$petition.title}></a>
            </li>
        <{/foreach}>
    <{/if}>
</ul>
