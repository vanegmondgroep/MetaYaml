<?php

namespace test\unit\VanEgmond\MetaYaml\NodeValidator;

use mageekguy\atoum;
use VanEgmond\MetaYaml\NodeValidator\NodeValidator as testedClass;
use VanEgmond\MetaYaml\SchemaValidator;

class NodeValidator extends atoum\test
{
    public function testDefault()
    {
        $this
            ->if($schema_validator = new SchemaValidator())
            ->and($object = new \mock\VanEgmond\MetaYaml\NodeValidator\NodeValidator($schema_validator))
            ->then
                ->object($object)->isInstanceOf('VanEgmond\\MetaYaml\\NodeValidator\\NodeValidator')
        ;
    }
}