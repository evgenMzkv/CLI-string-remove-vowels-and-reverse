#!/usr/bin/env php
<?php

function __autoload($className) {
    require_once $className . '.php';
}

print 'enter string to change: ';

$vowelKiller = new VowelKiller(fgets(STDIN));
$vowelKiller->filterAndReverse();

print $vowelKiller->getOutput() . PHP_EOL;