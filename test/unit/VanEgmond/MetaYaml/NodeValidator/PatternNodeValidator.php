<?php

namespace test\unit\VanEgmond\MetaYaml\NodeValidator;

use mageekguy\atoum;
use VanEgmond\MetaYaml\NodeValidator\PatternNodeValidator as testedClass;
use VanEgmond\MetaYaml\SchemaValidator;

class PatternNodeValidator extends atoum\test
{
    public function testAll()
    {
        $this
            ->if($schema_validator = new SchemaValidator())
            ->and($object = new testedClass($schema_validator))
            ->then
                ->boolean($object->validate('test', array('_pattern' => '/^test$/'), 'test'))->isEqualTo(true)
                ->boolean($object->validate('test', array('_pattern' => '/t/'), 'test'))->isEqualTo(true)
                ->boolean($object->validate('test', array('_pattern' => '/[0-9]+/'), 10))->isEqualTo(true)
                ->exception(function() use($object) { $object->validate('test', array('_pattern' => '/any/'), 'test'); })
                    ->hasMessage("Node 'test' does not match pattern '/any/'")
        ;
    }
}