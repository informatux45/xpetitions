<?php
/**
 * xPetition
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2 (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
 * @package         profile
 * @since           1.0.0
 * @author          www.informatux.com
 * @param $module
 * @return bool
 */

function xoops_module_install_xpetitions($module)
{
    global $xoopsDB, $xoopsUser;
    $languageDir = basename(dirname(__DIR__));

    xoops_loadLanguage('admin', $languageDir);

    $sql1 = 'INSERT INTO ' . $GLOBALS['xoopsDB']->prefix('xpetitions_emails') . " VALUES (1,'" . _AM_XPETITIONS_EMAIL_SIGNED_SUBJECT . "','" . _AM_XPETITIONS_EMAIL_SIGNED_BODY . "')";
    $sql2 = 'INSERT INTO ' . $GLOBALS['xoopsDB']->prefix('xpetitions_emails') . " VALUES (2,'" . _AM_XPETITIONS_EMAIL_NOTCONFIRMED_SUBJECT . "','" . _AM_XPETITIONS_EMAIL_NOTCONFIRMED_BODY . "')";

    $retVal = false;
    if ($xoopsUser) {
        if ($xoopsDB->query($sql1) && $xoopsDB->query($sql2)) {
            $retVal = true;
        }
    }

    return $retVal;
}
