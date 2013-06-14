<?php
/**
 * Author: Sergey Grigoriev
 */

require dirname(__FILE__) . '/Autoloader.php';

if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
} else {
    $lang = Language::DEFAULT_LANGUAGE;
}

$cv = new CVPage($lang);
echo $cv->getBody();