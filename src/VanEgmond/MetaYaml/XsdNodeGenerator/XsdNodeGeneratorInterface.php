<?php

namespace VanEgmond\MetaYaml\XsdNodeGenerator;

interface XsdNodeGeneratorInterface
{
    public function build($name, $node, \XMLWriter &$writer, $under_root);
}
