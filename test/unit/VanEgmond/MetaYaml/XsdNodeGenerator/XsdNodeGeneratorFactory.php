<?php

namespace test\unit\VanEgmond\MetaYaml\XsdNodeGenerator;

use mageekguy\atoum;
use VanEgmond\MetaYaml\XsdNodeGenerator\XsdNodeGeneratorFactory as testedClass;
use VanEgmond\MetaYaml\XsdGenerator;

class XsdNodeGeneratorFactory extends atoum\test
{
    public function testAll()
    {
        $this
            ->if($xsd_generator = new XsdGenerator())
            ->and($object = new testedClass())
            ->then
                ->object($object->getGenerator('test', 'text', $xsd_generator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\XsdNodeGenerator\\XsdTextNodeGenerator')
                ->object($object->getGenerator('test', 'array', $xsd_generator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\XsdNodeGenerator\\XsdArrayNodeGenerator')
                ->object($object->getGenerator('test', 'number', $xsd_generator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\XsdNodeGenerator\\XsdNumberNodeGenerator')
                ->object($object->getGenerator('test', 'boolean', $xsd_generator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\XsdNodeGenerator\\XsdBooleanNodeGenerator')
                ->object($object->getGenerator('test', 'enum', $xsd_generator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\XsdNodeGenerator\\XsdEnumNodeGenerator')
                ->object($object->getGenerator('test', 'pattern', $xsd_generator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\XsdNodeGenerator\\XsdPatternNodeGenerator')
                ->object($object->getGenerator('test', 'partial', $xsd_generator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\XsdNodeGenerator\\XsdPartialNodeGenerator')
                ->object($object->getGenerator('test', 'prototype', $xsd_generator))
                    ->isInstanceOf('VanEgmond\\MetaYaml\\XsdNodeGenerator\\XsdPrototypeNodeGenerator')
                ->exception(function() use ($object, $xsd_generator) {
                    $object->getGenerator('test', 'choice', $xsd_generator);
                })->hasMessage('Choice nodes are not supported')
                ->exception(function() use ($object, $xsd_generator) {
                    $object->getGenerator('test', 'random_stuff', $xsd_generator);
                })->hasMessage('Unknown generator type : random_stuff')
        ;
    }
}