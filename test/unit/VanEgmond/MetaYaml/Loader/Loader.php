<?php

namespace test\unit\VanEgmond\MetaYaml\Loader;

use mageekguy\atoum;
use VanEgmond\MetaYaml\Loader\Loader as testedClass;

class Loader extends atoum\test
{
    public function testBase()
    {
        $this
            ->if($object = new \mock\VanEgmond\MetaYaml\Loader\Loader())
            ->then
                ->object($object)->isInstanceOf('VanEgmond\\MetaYaml\\Loader\\Loader')
                ->string($object->loadFromFile('test/data/TestBasic/TestBase.yml'))
                    ->isEqualTo("fleurs:\n    rose: une rose\n    violette: une violette");
    }

    public function testFileNotFound()
    {
        $this
            ->if($object = new \mock\VanEgmond\MetaYaml\Loader\Loader())
            ->then
                ->object($object)->isInstanceOf('VanEgmond\\MetaYaml\\Loader\\Loader')
                ->exception(function() use ($object) { $object->loadFromFile('fileNotFound'); })
                    ->hasMessage("The file 'fileNotFound' was not found");
    }
}