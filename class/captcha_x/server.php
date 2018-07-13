<?php
/**
 * CAPTCHA image server
 * 
 */  
require_once __DIR__ . '/class.captcha_x.php';
$server = new captcha_x ();
$server->handle_request ();

