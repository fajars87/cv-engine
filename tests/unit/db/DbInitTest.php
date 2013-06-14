<?php
/**
 * Author: Sergey Grigoriev
 */

require_once dirname(__FILE__) . '/../../../sources/Autoloader.php';

class DbInitTest extends PHPUnit_Framework_TestCase {

    public function testCreateSqliteDbSchema() {
        DbInit::initSqliteDbSchema();
        GrigorievInit::initAllData();
    }
}
