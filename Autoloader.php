<?php
/**
 * Author: Sergey Grigoriev
 */

spl_autoload_register(array('Autoloader', 'autoload'));

class Autoloader {
    private static $classes = array(
        'Config' => '/Config.php',

        'GrigorievCommon' => '/db/init/GrigorievCommon.php',
        'GrigorievEn' => '/db/init/GrigorievEn.php',
        'GrigorievDe' => '/db/init/GrigorievDe.php',
        'GrigorievRu' => '/db/init/GrigorievRu.php',
        'GrigorievInit' => '/db/init/GrigorievInit.php',
        'DbInit' => '/db/init/DbInit.php',

        'Language' => '/Language.php',
        'Tracker' => '/utils/Tracker.php',

        'AbstractPage' => '/AbstractPage.php',
        'CVPage' => '/CVPage.php',
        'I18n' => '/I18n.php',

        'AbstractTable' => '/db/AbstractTable.php',
        'marital_statuses' => '/db/DbSchema.php',
        'i18n_languages' => '/db/DbSchema.php',
        'persons' => '/db/DbSchema.php',
        'positions' => '/db/DbSchema.php',
        'employers' => '/db/DbSchema.php',
        'educations' => '/db/DbSchema.php',
        'languages' => '/db/DbSchema.php',
        'courses_and_certificates' => '/db/DbSchema.php',
        'skill_proficiencies' => '/db/DbSchema.php',
        'skill_categories' => '/db/DbSchema.php',
        'technical_skills' => '/db/DbSchema.php',
        'projects' => '/db/DbSchema.php',
        'i18n_translations' => '/db/DbSchema.php',

        'Db' => '/db/Db.php',
        'ORM' => '/utils/db/lib/idiorm.php',

    );

    public static function autoload($className) {
        if(isset(self::$classes[$className])) {
            require_once dirname(__FILE__) . self::$classes[$className];
        }
    }
}