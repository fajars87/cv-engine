<?php
/**
 * Author: Sergey Grigoriev
 */

class I18n {

    const LOCALE_UTF8 = 0;
    const LANGUAGE = 1;
    const DATE_MONTH_YEAR = 2;
    const MONTH_YEAR = 3;
    const PRESENT_MOMENT = 4;

    private static $data = array(
        //    locale      , language , full       , short  , present moment
        array('en_US.UTF8', 'english', '%b %d, %Y', '%b %Y', 'Present'),
        array('de_DE.UTF8', 'german',  '%d.%m.%Y',  '%m.%Y', 'biz heute'),
        array('ru_RU.utf8', 'russian', '%d.%m.%Y',  '%m.%Y', 'настоящее время')
    );

    private static function runsOnWindows() {
        php_uname();
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            return true;
        }
        return false;
    }

    // format should be specified as an array position
    public static function localizedDate($date, $language, $format = I18n::MONTH_YEAR) {
        date_default_timezone_set('UTC');
        $result = strtotime($date);

        $lang = 0;

        if ($language === Language::LANG_EN) {
            $lang = 0;
        } else if ($language === Language::LANG_DE) {
            $lang = 1;
        } else if ($language === Language::LANG_RU) {
            $lang = 2;
        }

        setlocale(LC_TIME, self::$data[$lang][I18n::LOCALE_UTF8], self::$data[$lang][I18n::LANGUAGE]);
        $result = strftime(self::$data[$lang][$format], strtotime($date));
        if ($date === '0000-00-00') {
            $result = self::$data[$lang][I18n::PRESENT_MOMENT];
        }
        return $result;
    }
}