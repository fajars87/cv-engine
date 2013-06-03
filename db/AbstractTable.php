<?php
/**
 * Author: Sergey Grigoriev
 */

class AbstractTable {
    public static function tableName() {
        return get_called_class();
    }

    public static function fullFieldName($fieldName) {
        return get_called_class() . '.' . $fieldName;
    }
}