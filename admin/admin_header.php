<?php

$path = dirname(dirname(dirname(__DIR__)));
require_once $path . '/mainfile.php';
//require_once $path . '/include/cp_functions.php';
require_once $path . '/include/cp_header.php';
require_once __DIR__ . '/../include/functions.php';
require_once __DIR__ . '/../include/config.php';
require_once __DIR__ . '/../include/mysql.php';

//require_once $GLOBALS['xoops']->path('www/include/cp_functions.php');
//require_once $GLOBALS['xoops']->path('www/include/cp_header.php');
//require_once $GLOBALS['xoops']->path('www/class/xoopsformloader.php');

//require_once __DIR__ . '/../class/utility.php';
//require_once __DIR__ . '/../include/common.php';

$moduleDirName = basename(dirname(__DIR__));

if (false !== ($moduleHelper = Xmf\Module\Helper::getHelper($moduleDirName))) {
} else {
    $moduleHelper = Xmf\Module\Helper::getHelper('system');
}
$adminObject = \Xmf\Module\Admin::getInstance();

$pathIcon16    = \Xmf\Module\Admin::iconUrl('', 16);
$pathIcon32    = \Xmf\Module\Admin::iconUrl('', 32);
$pathModIcon32 = $moduleHelper->getModule()->getInfo('modicons32');

// Load language files
$moduleHelper->loadLanguage('admin');
$moduleHelper->loadLanguage('modinfo');
$moduleHelper->loadLanguage('main');

$myts = MyTextSanitizer::getInstance();

if (!isset($GLOBALS['xoopsTpl']) || !($GLOBALS['xoopsTpl'] instanceof XoopsTpl)) {
    require_once $GLOBALS['xoops']->path('class/template.php');
    $xoopsTpl = new XoopsTpl();
}
