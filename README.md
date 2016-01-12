# Soluble\Datatype

[![PHP Version](http://img.shields.io/badge/php-5.4+-ff69b4.svg)](https://packagist.org/packages/soluble/datatype)
[![HHVM Status](http://hhvm.h4cc.de/badge/soluble/datatype.svg)](http://hhvm.h4cc.de/package/soluble/datatype)
[![Build Status](https://travis-ci.org/belgattitude/soluble-datatype.png?branch=master)](https://travis-ci.org/belgattitude/soluble-datatype)
[![Code Coverage](https://scrutinizer-ci.com/g/belgattitude/soluble-datatype/badges/coverage.png?s=aaa552f6313a3a50145f0e87b252c84677c22aa9)](https://scrutinizer-ci.com/g/belgattitude/soluble-datatype/)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/belgattitude/soluble-datatype/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/belgattitude/soluble-datatype/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/soluble/datatype/v/stable.svg)](https://packagist.org/packages/soluble/datatype)
[![Total Downloads](https://poser.pugx.org/soluble/datatype/downloads.png)](https://packagist.org/packages/soluble/datatype)
[![License](https://poser.pugx.org/soluble/datatype/license.png)](https://packagist.org/packages/soluble/datatype)

## Introduction

Common datatype abstractions

## Requirements

- PHP engine 5.4+, 7.0 or HHVM >= 3.2.

## Documentation

 - [Manual](http://docs.soluble.io/soluble-datatype/manual/) in progress and [API documentation](http://docs.soluble.io/soluble-datatype/api/) available.

## Installation

### Installation in your PHP project

`Soluble\Datatype` works best via [composer](http://getcomposer.org/).

```sh
php composer require soluble/datatype:0.*
```
Most modern frameworks will include Composer out of the box, but ensure the following file is included:

```php
<?php
// include the Composer autoloader
require 'vendor/autoload.php';
```

## API

### AbstractColumnDefinition

Metadata information is stored as an `Soluble\Datatype\Column\Definition\AbstractColumnDefinition` object on which :


| General methods              | Return        | Description                                         |
|------------------------------|---------------|-----------------------------------------------------|
| `getName()`                  | `string`      | Return column name (unaliased)                      |
| `getAlias()`                 | `string`      | Return column alias                                 |
| `getTableName()`             | `string`      | Return origin table                                 |
| `getSchemaName()`            | `string`      | Originating schema for the column/table             |

| Type related methods         | Return        | Description                                         |
|------------------------------|---------------|-----------------------------------------------------|
| `getDataType()`              | `string`      | Column datatype (see Column\Type)                   |
| `getNativeDataType()`        | `string`      | Return native datatype                              |
| `isText()`                   | `boolean`     | Whether the column is textual (string, blog...)     |
| `isNumeric()`                | `boolean`     | Whether the column is numeric (decimal, int...)     |
| `isDate()`                   | `boolean`     | Is a date type                                      |

| Extra information methods    | Return        | Description                                         |
|------------------------------|---------------|-----------------------------------------------------|
| `isComputed()`               | `boolean`     | Whether the column is computed, i.e. '1+1, sum()    |
| `isGroup()`                  | `boolean`     | Grouped operation sum(), min(), max()               |


| Source infos                 | Return        | Description                                         |
|------------------------------|---------------|-----------------------------------------------------|
| `isPrimary()`                | `boolean`     | Whether the column is (part of) primary key         |
| `isNullable()`               | `boolean`     | Whether the column is nullable                      |
| `getColumnDefault()`         | `string`      | Return default value for column                     |
| `getOrdinalPosition()`       | `integer`     | Return position in the select                       |


### Implementation od `AbstractColumnDefinition`

Concrete implementations of `Soluble\Datatype\Column\Definition\AbstractColumnDefinition` are

| Drivers              | Interface                 | Description                   |
|----------------------|---------------------------|-------------------------------|
| `BitColumn`          |                           |                               |
| `BlobColumn`         |                           |                               |
| `BooleanColumn`      |                           |                               |
| `DateColumn`         | `DateColumnInterface`     |                               |
| `DateTimeColumn`     | `DatetimeColumnInterface` |                               |
| `DecimalColumn`      | `NumericColumnInterface`  |                               |
| `FloatColumn`        | `NumericColumnInterface`  |                               |
| `GeometryColumn`     |                           |                               |
| `IntegerColumn`      | `NumericColumnInterface`  |                               |
| `StringColumn`       | `TextColumnInterface`     |                               |
| `TimeColumn`         |                           |                               |


## Coding standards

* [PSR 4 Autoloader](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md)
* [PSR 2 Coding Style Guide](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)
* [PSR 1 Coding Standards](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md)
* [PSR 0 Autoloading standards](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md)


