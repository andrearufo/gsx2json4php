# gsx2json4php

The **gsx2json4php** is a simple PHP class to parse a Google Spreadsheet into a JSON.

This is inspired by https://github.com/55sketch/gsx2json:

> One useful feature of Google Spreadsheets is the ability to access the data as JSON by using a particular feed URL. However, this is a bit fiddly to do, and the resulting JSON is pretty unreadable, with usable data buried deep inside objects.
>
>This API connects to your spreadsheet and santizes the data, providing simple, readable JSON for you to use in your app.

## Installing gsx2json4php

The recommended way to install gsx2json4php is through Composer.

```
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of gsx2json4php:

```
php composer.phar require andrearufo/gsx2json4php
```

or

```
composer require andrearufo/gsx2json4php
```

After installing, you need to require Composer's autoloader:

```
require 'vendor/autoload.php';
```

You can then later update gsx2json4php using composer:

```
php composer.phar update
```

## How to use

First, you must publish your spreadsheet to the web, using _File -> Publish To Web_ in your Google Spreadsheet.

Copy your Spreadsheet ID to use into the script:

```php
<?php

require 'vendor/autoload.php';

use AndreaRufo\Gsx2Json4Php;

$id = '1QhzoMZY8LZ7ynfqnXlH9cqKax16_ECOqThgjbHqCO7Q';
$json = new Gsx2Json4Php($id);

echo $json->getJson();

```
