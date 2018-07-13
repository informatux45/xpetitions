<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * @copyright    {@link https://xoops.org/ XOOPS Project}
 * @license      {@link http://www.gnu.org/licenses/gpl-2.0.html GNU GPL 2 or later}
 * @package
 * @since
 * @author       XOOPS Development Team
 */

// includes
require_once __DIR__ . '/admin_header.php';
//include_once("header.inc.php");
require_once XOOPS_ROOT_PATH . '/class/pagenav.php';

xoops_cp_header();
$adminObject = \Xmf\Module\Admin::getInstance();
$adminObject->displayNavigation(basename(__FILE__));
$adminObject->addItemButton(_AM_XPETITIONS_CREATE_BUTTON, 'petitions.php', 'add');
$adminObject->displayButton('left');

?>
    <script type="text/javascript" src="<?php echo XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname'); ?>/include/functions.js"></script>
<?php

echo '<div id="central">';
//xpetitions_adminmenu(0, _AM_XPETITIONS_INDEX);

global $xoopsConfig, $xoopsModuleConfig, $xoopsModule, $xoopsDB;

// Aide
helpMenu(_AM_XPETITIONS_INDEX_HELP1, _AM_XPETITIONS_INDEX_HELP2);
//echo '<br>';

// Tableau des pétitions
echo '<br><table style="text-align: left; width: 100%;" border="0" cellpadding="2" cellspacing="1" class="outer">';
echo '<tbody><tr class="bg3">';
echo '<th style="width: 5%; text-align: center;">' . _AM_XPETITIONS_INDEX_TAB1 . '</td>';
echo '<th style="width: 50%; text-align: center;">' . _AM_XPETITIONS_INDEX_TAB2 . '</td>';
echo '<th style="width: 15%; text-align: center;">' . _AM_XPETITIONS_INDEX_TAB3 . '</td>';
echo '<th style="width: 15%; text-align: center;">' . _AM_XPETITIONS_INDEX_TAB4 . '</td>';
echo '<th style="width: 15%; text-align: center;">' . _AM_XPETITIONS_INDEX_TAB5 . '</td>';
echo '</tr>';

$petitions_count     = getPetitionsCount();
$petitions_sql       = 'SELECT * FROM ' . $xoopsDB->prefix('xpetitions_petitions');
$petitions_pagestart = isset($_GET['page']) ? (int)$_GET['page'] : 0;

if ($petitions_count < 1) {
    echo '<tr><td colspan="5">';
    echo '<span class="gras">' . _AM_XPETITIONS_NONE . '</span>';
    echo '</td></tr>';
    echo '</tbody></table>';
} else {
    $pagenav           = new XoopsPageNav($petitions_count, $xoopsModuleConfig['adminindex_page'], $petitions_pagestart, 'page');
    $limite            = limite($petitions_pagestart, $petitions_count, $xoopsModuleConfig['adminindex_page'], $petitions_sql);
    $petitions_aff_tab = dbResultToArray($limite);

    foreach ($petitions_aff_tab as $row) {
        echo '<tr class="bg1"><td style="text-align: center;">';
        echo $row['id'];
        echo '</td><td style="text-align: left;">';
        echo '<a href="' . XOOPS_URL . '/modules/' . $xoopsModule->getVar('dirname') . '/main.php?id=' . $row['id'] . '">' . $myts->displayTarea($row['title']) . '</a>';
        echo '</td><td style="text-align: center;">';
        echo formatdatefr($row['date']);
        echo '</td><td style="text-align: center;">';
        echo '<img src="../assets/images/' . $row['status'] . '.png">';
        echo '</td><td style="text-align: center;">';
        echo '<a href="petitions.php?op=modif&id=' . $row['id'] . '"><img src=' . $pathIcon16 . '/edit.png alt="' . _AM_XPETITIONS_UPDATE . '" title="' . _AM_XPETITIONS_UPDATE . '"></a>';
        echo '&nbsp;';
        echo '<a href="petitions.php?op=delete&id=' . $row['id'] . '&name=' . $row['name'] . '&ok=0"><img src=' . $pathIcon16 . '/delete.png alt="' . _AM_XPETITIONS_CANCEL . '" title="' . _AM_XPETITIONS_CANCEL . '"></a>';
        echo '</td></tr>';
    }
    echo '</tbody></table>';
    echo "<div align='right'>" . $pagenav->renderNav() . '</div><br>';
}

echo '</div>'; // fin id central

require_once __DIR__ . '/admin_footer.php';
