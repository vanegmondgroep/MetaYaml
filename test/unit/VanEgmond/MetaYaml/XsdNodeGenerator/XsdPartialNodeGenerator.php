<?php

namespace test\unit\VanEgmond\MetaYaml\XsdNodeGenerator;

use mageekguy\atoum;
use VanEgmond\MetaYaml\XsdNodeGenerator\XsdPartialNodeGenerator as testedClass;
use VanEgmond\MetaYaml\XsdGenerator;

class XsdPartialNodeGenerator extends atoum\test
{
    public function testBase()
    {
        $this
            ->if($xsd_generator = new XsdGenerator())
            ->and($object = new testedClass($xsd_generator))
            ->then
                ->object($object)
                    ->isInstanceOf('VanEgmond\\MetaYaml\\XsdNodeGenerator\\XsdPartialNodeGenerator')
                ->exception(function() use ($object) { $object->build('test', array('_partial' => 'nom_partial'),  new \XMLWriter(), false); })
                    ->hasMessage("You're using a partial but partial 'nom_partial' is not defined in your schema")
        ;
    }
}