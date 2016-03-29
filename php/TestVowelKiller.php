<?php

require_once 'VowelKiller.php';

class TestVowelKiller extends PHPUnit_Framework_TestCase
{

    public function testEmptyValue()
    {
        $string = '';
        $testable = new VowelKiller($string);

        $this->assertTrue($testable->getOutput() === '');
    }

    public function testIsVowel()
    {
        $testable = new VowelKiller('dummy string');
        $reflector = new ReflectionClass('VowelKiller');
        $method = $reflector->getMethod('isVowel');
        $method->setAccessible(true);

        $result = $method->invokeArgs($testable, ['a']);
        $this->assertEquals(true, $result);
    }

    public function testStringReverse()
    {
        $string = 'Hello, world!';
        $testable = new VowelKiller($string);
        $testable->filterAndReverse();

        $this->assertTrue($testable->getOutput() === '!dlrw ,llH');
    }

}
