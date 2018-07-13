<{include file='db:xpetitions_header.tpl'}>

<{if !$petition_offline}>
    <div class="xpetitions">

        <div class="xpetitions_title"><{$petition_title}></div>

        <div class="xpetitions_sign_recorded">
            <img class="xpetitions_sign_img" src="assets/images/xpetitions_sign.jpg">
            <{if $petition_presign}>
                <{$petition_presign}>
            <{else}>
                <{$petition_presign_valid}>
                <div style="text-align: center;">
                    <form action="<{$petition_presign_form_action}>" method="post">
                        <{securityToken}><{*//mb*}>
                        <input type="hidden" name="firstname" value="<{$pre_firstname}>">
                        <input type="hidden" name="lastname" value="<{$pre_lastname}>">
                        <input type="hidden" name="address" value="<{$pre_address}>">
                        <input type="hidden" name="zip" value="<{$pre_zip}>">
                        <input type="hidden" name="city" value="<{$pre_city}>">
                        <input type="hidden" name="country" value="<{$pre_country}>">
                        <input type="hidden" name="job" value="<{$pre_job}>">
                        <input type="hidden" name="email" value="<{$pre_email}>">
                        <input type="hidden" name="date" value="<{$pre_date}>">
                        <input type="hidden" name="ip" value="<{$pre_ip}>">
                        <input type="hidden" name="cle" value="<{$pre_cle}>">
                        <input type="submit" value="<{$petition_value}>">
                    </form>
                </div>
            <{/if}>
        </div>

    </div>
<{else}>
    <div class="xpetitions_offline"><{$petition_offline}></div>
<{/if}>

<{include file='db:xpetitions_footer.tpl'}>
