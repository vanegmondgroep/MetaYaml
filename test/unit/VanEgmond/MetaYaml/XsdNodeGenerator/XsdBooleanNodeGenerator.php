<?php

namespace test\unit\VanEgmond\MetaYaml\XsdNodeGenerator;

use mageekguy\atoum;
use VanEgmond\MetaYaml\XsdNodeGenerator\XsdBooleanNodeGenerator as testedClass;
use VanEgmond\MetaYaml\XsdGenerator;

class XsdBooleanNodeGenerator extends atoum\test
{
    public function testBase()
    {
        $this
            ->if($xsd_generator = new XsdGenerator())
            ->and($object = new testedClass($xsd_generator))
            ->and($writer = new \XMLWriter())
            ->and($writer->openMemory())
            ->then
                ->variable($object->build('test', array(), $writer, false))->isNull()
                ->string($writer->outputMemory())
                    ->isEqualTo('<xsd:element name="test" minOccurs="0" type="xsd:boolean"/>');
        ;
    }
}