<?php
/**
 * Author: Sergey Grigoriev
 */

require_once dirname(__FILE__) . '/../../Autoloader.php';

class DbInitTest extends PHPUnit_Framework_TestCase {

    public function testCreateSqliteDbSchema() {
        DbInit::initSqliteDbSchema();
        GrigorievInit::initAllData();
    }
}
