<?php

namespace test\unit\VanEgmond\MetaYaml\Loader;

use mageekguy\atoum;
use VanEgmond\MetaYaml\Loader\YamlLoader as testedClass;

class YamlLoader extends atoum\test
{
    public function testBase()
    {
        $this
            ->if($object = new testedClass())
            ->then
                ->object($object)->isInstanceOf('VanEgmond\\MetaYaml\\Loader\\YamlLoader')
                ->array($object->loadFromFile('test/data/TestBasic/TestBase.yml'))
                    ->isEqualTo(array(
                        'fleurs' => array(
                            'rose' => 'une rose',
                            'violette' => 'une violette'
                        )
                    ));
    }
}