<{include file='db:xpetitions_header.tpl'}>

<{if !$petition_offline}>
    <div class="xpetitions">

        <div class="xpetitions_title"><{$petition_title}></div>

        <div class="xpetitions_sign_recorded">
            <img class="xpetitions_sign_img" src="assets/images/xpetitions_sign.jpg">
            <{$petition_sign}>
        </div>

    </div>
<{else}>
    <div class="xpetitions_offline"><{$petition_offline}></div>
<{/if}>

<{include file='db:xpetitions_footer.tpl'}>
