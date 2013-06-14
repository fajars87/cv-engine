<?php
/**
 * Author: Sergey Grigoriev
 */

class I18n {
    private static function runsOnWindows() {
        php_uname();
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            return true;
        }
        return false;
    }

    public static function localizedDate($date, $language) {
        date_default_timezone_set('UTC');
        $result = strtotime($date);

        if ($language === Language::LANG_EN) {
            setlocale(LC_TIME, 'en_US.UTF8', 'english');
            $result = strftime('%b %Y', strtotime($date));
            if ($date === '0000-00-00') {
                $result = 'Present';
            }
        } else if ($language === Language::LANG_DE) {
            setlocale(LC_TIME, 'de_DE.UTF8', 'german');
            $result = strftime('%m.%Y', strtotime($date));
            if ($date === '0000-00-00') {
                $result = 'biz heute';
            }
        } else if ($language === Language::LANG_RU) {
            setlocale(LC_TIME, 'ru_RU.utf8', 'russian');
            $result = strftime('%m.%Y', strtotime($date));
            if ($date === '0000-00-00') {
                $result = 'настоящее время';
            }
        }
        return $result;
    }

}