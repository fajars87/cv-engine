<?php
/**
 * Author: Sergey Grigoriev
 */

class DbInit {
    public static function initSqliteDbSchema() {
        ORM::configure(Config::getDbConnectionString());
        $db = ORM::get_db();
        $sql = file_get_contents(dirname(__FILE__) . '/../../../db/create_db_sqlite.sql');
        $result = $db->exec($sql);
        return $result;
    }
}
