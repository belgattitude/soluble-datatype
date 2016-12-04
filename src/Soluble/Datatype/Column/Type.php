<?php

namespace Soluble\Datatype\Column;

use Soluble\Datatype\Exception;
use Soluble\Datatype\Column\Definition\AbstractColumnDefinition;

class Type
{
    const TYPE_INTEGER = 'integer';
    const TYPE_DECIMAL = 'decimal';
    const TYPE_STRING = 'string';
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_DATETIME = 'datetime';
    const TYPE_BLOB = 'blob';
    const TYPE_DATE = 'date';
    const TYPE_TIME = 'time';
    const TYPE_FLOAT = 'float';
    const TYPE_BIT = 'bit';
    const TYPE_SPATIAL_GEOMETRY = 'geometry';
    const TYPE_NULL = 'null';

    /**
     * @var array
     */
    protected static $typesMap = [
        self::TYPE_INTEGER => 'Definition\IntegerColumn',
        self::TYPE_DECIMAL => 'Definition\DecimalColumn',
        self::TYPE_STRING => 'Definition\StringColumn',
        self::TYPE_BOOLEAN => 'Definition\BooleanColumn',
        self::TYPE_DATETIME => 'Definition\DatetimeColumn',
        self::TYPE_BLOB => 'Definition\BlobColumn',
        self::TYPE_DATE => 'Definition\DateColumn',
        self::TYPE_TIME => 'Definition\TimeColumn',
        self::TYPE_FLOAT => 'Definition\FloatColumn',
        self::TYPE_BIT => 'Definition\BitColumn',
        self::TYPE_SPATIAL_GEOMETRY => 'Definition\GeometryColumn',
        self::TYPE_NULL => 'Definition\NullColumn'
    ];

    /**
     * @param string $datatype
     * @param string $name
     * @param string $tableName
     * @param string $schemaName
     *
     * @throws Exception\UnsupportedDatatypeException
     *
     * @return AbstractColumnDefinition
     */
    public static function createColumnDefinition($datatype, $name, $tableName = null, $schemaName = null)
    {
        if (!array_key_exists($datatype, self::$typesMap)) {
            throw new Exception\UnsupportedTypeException(__METHOD__ . " Type '$datatype' is not supported.");
        }
        $class = __NAMESPACE__ . '\\' . self::$typesMap[$datatype];

        return new $class($name, $tableName, $schemaName);
    }

    /**
     * Return all supported types.
     *
     * @return array
     */
    public static function getSupportedTypes()
    {
        return array_keys(self::$typesMap);
    }
}
