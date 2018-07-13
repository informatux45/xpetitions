<{include file='db:xpetitions_header.tpl'}>

<{if !$petition_offline}>

<div class="xpetitions">

    <div class="xpetitions_title">
        <{$petition_title}><br>
        <{$whoview}>
    </div>
    <{if $whoview_group == 1 || $whoview_group == 2 && $xoops_isuser || $whoview_group == 3 && $xoops_isadmin}>
        <div class="xpetitions_allsigns_cpt">
            <{$petitions_allsigns_cpt}>
        </div>
        <div class="xpetitions_allsigns_title">
            <{$petitions_allsigns_title}>
            <{foreach item=petition from=$petitions_allsigns}>
                <{$petition.letter}>
            <{/foreach}>
        </div>
        <div class="xpetitions_allsigns_show">
            <{if $petitions_allsigns_noshow}>
            <{$petitions_allsigns_noshow}>
            <{else}>
            <span class="xpetitions_allsigns_letter"><{$petitions_allsigns_letter}></span><br><br>
            <{* Show signatures *}>
            <{if $petitions_option_col == 'colonne'}>
            <div style="width: <{$petitions_sign_divcol}>%; float: left;">
                <{foreach item=petition from=$petitions_allsigns_show name=allsign1}>
                <{$petition.lastname}>&nbsp;<{$petition.firstname}>
                <{if $petitions_option_job OR $petitions_option_country OR $petitions_option_email OR $petitions_option_city OR $petitions_option_date}>
                    (
                    <{if $petitions_option_job == '1' AND $petition.job}>
                        <{$petition.job}>
                    <{/if}>
                    <{if $petitions_option_country == '1' AND $petition.country}>
                        <{if $petitions_option_job == '1' AND $petition.job}>
                            &nbsp;-&nbsp;
                        <{/if}>
                        <{$petition.country}>
                    <{/if}>
                    <{if $petitions_option_email AND $petition.email}>
                        <{if ($petitions_option_job == '1' AND $petition.job) OR ($petitions_option_country == '1' AND $petition.country)}>
                            &nbsp;-&nbsp;
                        <{/if}>
                        <{$petition.email}>
                    <{/if}>
                    <{if $petitions_option_city AND $petition.city}>
                        <{if ($petitions_option_job == '1' AND $petition.job) OR ($petitions_option_country == '1' AND $petition.country) OR ($petitions_option_email AND $petition.email)}>
                            &nbsp;-&nbsp;
                        <{/if}>
                        <{$petition.city}>
                    <{/if}>
                    <{if $petitions_option_date AND $petition.date}>
                        <{if ($petitions_option_job == '1' AND $petition.job) OR ($petitions_option_country == '1' AND $petition.country) OR ($petitions_option_email AND $petition.email) OR ($petitions_option_city AND $petition.city)}>
                            &nbsp;-&nbsp;
                        <{/if}>
                        <{$petition.date}>
                    <{/if}>
                    )
                <{/if}>
                <br>
                <{if $smarty.foreach.allsign1.index % $petitions_sign_nb == 0 AND $smarty.foreach.allsign1.index != 0}>
            </div>
            <div style="width: <{$petitions_sign_divcol}>%; float: left;">
                <{/if}>
                <{/foreach}>
                <{else}>
                <{foreach item=petition from=$petitions_allsigns_show name=allsign}>
                    <{strip}>
                        <{$petition.lastname}>&nbsp;<{$petition.firstname}>
                        <{if $petitions_option_job OR $petitions_option_country OR $petitions_option_email OR $petitions_option_city OR $petitions_option_date}>
                            (
                            <{if $petitions_option_job == '1' AND $petition.job}>
                                <{$petition.job}>
                            <{/if}>
                            <{if $petitions_option_country == '1' AND $petition.country}>
                                <{if $petitions_option_job == '1' AND $petition.job}>
                                    &nbsp;-&nbsp;
                                <{/if}>
                                <{$petition.country}>
                            <{/if}>
                            <{if $petitions_option_email AND $petition.email}>
                                <{if ($petitions_option_job == '1' AND $petition.job) OR ($petitions_option_country == '1' AND $petition.country)}>
                                    &nbsp;-&nbsp;
                                <{/if}>
                                <{$petition.email}>
                            <{/if}>
                            <{if $petitions_option_city AND $petition.city}>
                                <{if ($petitions_option_job == '1' AND $petition.job) OR ($petitions_option_country == '1' AND $petition.country) OR ($petitions_option_email AND $petition.email)}>
                                    &nbsp;-&nbsp;
                                <{/if}>
                                <{$petition.city}>
                            <{/if}>
                            <{if $petitions_option_date AND $petition.date}>
                                <{if ($petitions_option_job == '1' AND $petition.job) OR ($petitions_option_country == '1' AND $petition.country) OR ($petitions_option_email AND $petition.email) OR ($petitions_option_city AND $petition.city)}>
                                    &nbsp;-&nbsp;
                                <{/if}>
                                <{$petition.date}>
                            <{/if}>
                            )
                        <{/if}>
                        <{if $smarty.foreach.allsign.last}><{else}>,&nbsp;<{/if}>
                    <{/strip}>
                <{/foreach}>
                <{/if}>
                <br><br>
                <{/if}>
            </div>

        </div>
    <{else}>
        <div class="xpetitions_offline"><{$petition_offline}></div>
    <{/if}>

    <{/if}>
    <{include file='db:xpetitions_footer.tpl'}>
