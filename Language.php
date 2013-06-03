<?php
/**
 * Author: Sergey Grigoriev
 */

class Language {
    const LANG_EN = 'en';
    const LANG_DE = 'de';
    const LANG_RU = 'ru';

    const COOKIE_LANG_NAME = 'language';
    const DEFAULT_LANGUAGE = self::LANG_EN;
    const COOKIE_TTL = 86400;


    public static function setDefaultLanguage() {
        if (!self::isLanguageSet()) {
            self::setLanguage(self::DEFAULT_LANGUAGE);
        }
    }

    public static function getLanguage() {
        $lang = self::DEFAULT_LANGUAGE;

        if (self::isLanguageSet()) {
            if (self::isLanguageValueValid($_COOKIE[self::COOKIE_LANG_NAME])) {
                $lang = $_COOKIE[self::COOKIE_LANG_NAME];
            }
        }

        return $lang;
    }

    public static function setLanguage($lang) {
        if (self::isLanguageValueValid($lang)) {
            setcookie(self::COOKIE_LANG_NAME, $lang, time() + self::COOKIE_TTL, '/');
        }
    }

    private static function isLanguageSet() {
        return isset($_COOKIE[self::COOKIE_LANG_NAME]);
    }

    private static function isLanguageValueValid($lang) {
        return ($lang == self::LANG_EN || $lang == self::LANG_DE || $lang == self::LANG_RU);
    }
}