<?php

include_once 'vendor/autoload.php';

$validator = new \NilPortugues\Validator\Validator();

$age = $validator->isInteger('age');

$result = $age
    ->isPositive()
    ->isBetween(0, 100, true)
    ->validate(28);

var_dump($result);
var_dump($age->getErrors());
