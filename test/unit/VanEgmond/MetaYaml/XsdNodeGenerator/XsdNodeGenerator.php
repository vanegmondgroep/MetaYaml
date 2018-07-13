<?php

namespace test\unit\VanEgmond\MetaYaml\XsdNodeGenerator;

use mageekguy\atoum;
use VanEgmond\MetaYaml\XsdNodeGenerator\XsdNodeGenerator as testedClass;
use VanEgmond\MetaYaml\XsdGenerator;

class XsdNodeGenerator extends atoum\test
{
    public function testDefault()
    {
        $this
            ->if($xsd_generator = new XsdGenerator())
            ->and($object = new \mock\VanEgmond\MetaYaml\XsdNodeGenerator\XsdNodeGenerator($xsd_generator))
            ->then
                ->object($object)->isInstanceOf('VanEgmond\\MetaYaml\\XsdNodeGenerator\\XsdNodeGenerator')
        ;
    }
}