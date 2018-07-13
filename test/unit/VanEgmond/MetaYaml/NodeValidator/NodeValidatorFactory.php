<?php

namespace test\unit\VanEgmond\MetaYaml\NodeValidator;

use mageekguy\atoum;
use VanEgmond\MetaYaml\NodeValidator\NodeValidatorFactory as testedClass;
use VanEgmond\MetaYaml\SchemaValidator;

class NodeValidatorFactory extends atoum\test
{
    public function testAll()
    {
        $this
            ->if($schema_validator = new SchemaValidator())
            ->and($object = new testedClass())
            ->then
                ->object($object->getValidator('test', 'number', $schema_validator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\NodeValidator\\NumberNodeValidator')
                ->object($object->getValidator('test', 'text', $schema_validator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\NodeValidator\\TextNodeValidator')
                ->object($object->getValidator('test', 'pattern', $schema_validator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\NodeValidator\\PatternNodeValidator')
                ->object($object->getValidator('test', 'boolean', $schema_validator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\NodeValidator\\BooleanNodeValidator')
                ->object($object->getValidator('test', 'enum', $schema_validator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\NodeValidator\\EnumNodeValidator')
                ->object($object->getValidator('test', 'array', $schema_validator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\NodeValidator\\ArrayNodeValidator')
                ->object($object->getValidator('test', 'prototype', $schema_validator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\NodeValidator\\PrototypeNodeValidator')
                ->object($object->getValidator('test', 'choice', $schema_validator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\NodeValidator\\ChoiceNodeValidator')
                ->object($object->getValidator('test', 'partial', $schema_validator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\NodeValidator\\PartialNodeValidator')
                ->exception(function() use ($object, $schema_validator) {
                    $object->getValidator('test', 'random_stuff', $schema_validator);
                    })->hasMessage('Unknown validator type : random_stuff')
        ;
    }
}