<?php
/**
 * Author: Sergey Grigoriev
 */

class Config {
    const PERSON_UNIQUE_NAME = 'sergeygrigoriev';
    const DEFAULT_LANGUAGE = 'en';

    const SQLITE_DB = 'grigoriev_cv.sqlite';

    public static function getDbConnectionString() {
        return 'sqlite:' . dirname(__FILE__) . '/' . self::SQLITE_DB;
    }
}