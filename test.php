<?php

// welcome

require 'vendor/autoload.php';

use AndreaRufo\Gsx2Json4Php;

// try with '1QhzoMZY8LZ7ynfqnXlH9cqKax16_ECOqThgjbHqCO7Q'
// $id = $_GET['id'];

// $id = '1G3T5ICT-kwZtNcUZoo2-JZcn1JCwm6-mGREcmBKAXNg';
$id = '1QhzoMZY8LZ7ynfqnXlH9cqKax16_ECOqThgjbHqCO7Q';
$json = new Gsx2Json4Php($id);

echo $json->getJson();
