<?php
/* ******************************************* */
/*                INFORMATUX                   */
/*         http://www.informatux.com/          */
/*       SOLUTIONS AND WEB DEVELOPMENT         */
/*             Patrice BOUTHIER                */
/*                   2009                      */
/* ------------------------------------------- */
/*    XOOPS - PHP Content Management System    */
/*         Copyright (c) 2000 XOOPS.org        */
/*            <http://www.xoops.org/>          */
/* ******************************************* */

function _captchaLettres()
{
    $str = _MD_XPETITIONS_CAPTCHA_STRING; // on cree la chaine
    $str .= strtoupper($str);
    $length = mt_rand(5, 12);
    $str = substr(str_shuffle($str), 0, $length);
    $pos = mt_rand(2, $length-1); // on choisi la position
    
    if (!isset($_SESSION)) {// on met le resultat en session puis on renvoit la question
        session_start();
    }
    
    $_SESSION['captcha_image'] = $str[$pos-1];
    
    return _MD_XPETITIONS_CAPTCHA_TXT_IN.' <b>'.$str.'</b> '._MD_XPETITIONS_CAPTCHA_TXT_1.' <b>'.$str[$pos-2].'</b> '._MD_XPETITIONS_CAPTCHA_TXT_AND.' <b>'.$str[$pos].'</b>';
}

function _captchaCalculChiffres()
{
    $operators = ['-', '+', '*'];
    $operator = $operators[array_rand($operators)];// on recupere l'operateur de calcul
    
    $nb1 = rand(1, 10);
    $nb2 = ($operator === '-') ? mt_rand(1, $nb1) : mt_rand(1, 10); // on evite les resultats negatif en cas de soustraction
    
    $calcul = $nb1.' '.$operator.' '.$nb2;
    
    if (!isset($_SESSION)) {// on met le resultat en session puis on renvois la question
        session_start();
    }
    
    eval('$_SESSION[\'captchaResult\'] = strval('.$nb1.$operator.$nb2.');');

    return _MD_XPETITIONS_CAPTCHA_TXT_2.' <b>'.$nb1.' '.($operator === '*' ? 'x' : $operator).' '.$nb2.'</b>';
}

function _captchaCalculLettres()
{
    $operators = ['-' => _MD_XPETITIONS_CAPTCHA_TXT_LESS, '+' => _MD_XPETITIONS_CAPTCHA_TXT_MORE, '*' => _MD_XPETITIONS_CAPTCHA_TXT_TIMES];
    $operator = array_rand($operators);
    $op = $operators[$operator]; // on recupere l'operateur de calcul
    
    $num = [
                _MD_XPETITIONS_CAPTCHA_TXT_ZERO, _MD_XPETITIONS_CAPTCHA_TXT_ONE, _MD_XPETITIONS_CAPTCHA_TXT_TWO,
        _MD_XPETITIONS_CAPTCHA_TXT_THREE, _MD_XPETITIONS_CAPTCHA_TXT_FOUR, _MD_XPETITIONS_CAPTCHA_TXT_FIVE,
                _MD_XPETITIONS_CAPTCHA_TXT_SIX, _MD_XPETITIONS_CAPTCHA_TXT_SEVEN, _MD_XPETITIONS_CAPTCHA_TXT_EIGHT,
                _MD_XPETITIONS_CAPTCHA_TXT_NINE, _MD_XPETITIONS_CAPTCHA_TXT_TEN
    ];

    $nb1 = array_rand($num);
    $nb2 = array_rand($num);
    
    if ($operator === '-' && $nb1 < $nb2) {
        while ($nb1 < ($nb2 = array_rand($num)));
    } // on evite les resultats negatif en cas de soustraction
    
    if (!isset($_SESSION)) { // on met le resultat en session puis on renvois la question
        session_start();
    }

    eval('$_SESSION[\'captchaResult\'] = strval('.$nb1.$operator.$nb2.');');

    return _MD_XPETITIONS_CAPTCHA_TXT_2.' <b>'.$num[$nb1].' '.$op.' '.$num[$nb2].'</b>';
}

function _captchaAlphaNum()
{
    $str = md5(time()); // creation de la chaine
    $length = mt_rand(5, 12);
    $str = substr($str, 0, $length);
    $pos = mt_rand(1, $length); // on choisi la position
    
    if (!isset($_SESSION)) {// on met le resultat en session puis on renvois la question
        session_start();
    }
    
    $_SESSION['captcha_image'] = $str[$pos-1];
    
    if ($pos === 1) {
        $pos = _MD_XPETITIONS_CAPTCHA_TXT_THEFIRST;
    } elseif ($pos === 2) {
        $pos = _MD_XPETITIONS_CAPTCHA_TXT_THESECOND;
    } elseif ($pos === $length) {
        $pos = _MD_XPETITIONS_CAPTCHA_TXT_THELAST;
    } elseif ($pos === ($length-1)) {
        $pos = _MD_XPETITIONS_CAPTCHA_TXT_THELASTFRONT;
    } else {
        $pos = _MD_XPETITIONS_CAPTCHA_TXT_THE.' '.$pos.'e';
    }
    
    return _MD_XPETITIONS_CAPTCHA_TXT_3.' '.$pos.' '._MD_XPETITIONS_CAPTCHA_TXT_4.' <b>'.$str.'</b>';
}


function getCaptcha()
{
    $functions = [
                    '_captchaLettres',  '_captchaCalculChiffres',
                    '_captchaCalculLettres', '_captchaAlphaNum'
    ];
    
    $captcha = $functions[array_rand($functions)];
    return $captcha();
}


function checkCaptcha($postVarName = 'captchaResult', $caseInsensitive = false)
{
    if (!isset($_SESSION)) {
        session_start();
    }
    
    if (!isset($_POST[$postVarName],$_SESSION['captcha_image'])) {
        return false;
    }
    
    if ($caseInsensitive === true && !is_numeric($_SESSION['captcha_image'])) {
        $_POST[$postVarName] = strtolower($_POST[$postVarName]);
        $_SESSION['captcha_image'] = strtolower($_SESSION['captcha_image']);
    }
    
    return ($_POST[$postVarName] === $_SESSION['captcha_image']);
}
