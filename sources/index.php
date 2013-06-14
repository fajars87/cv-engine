<?php
/**
 * Author: Sergey Grigoriev
 */

error_reporting(E_ALL);

require dirname(__FILE__) . '/Autoloader.php';

Tracker::getInstance()->logUser();

Language::setDefaultLanguage();

$lang = Language::getLanguage();

$cv = new CVPage($lang);
$cv->printHtmlPage();