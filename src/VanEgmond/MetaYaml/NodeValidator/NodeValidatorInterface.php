<?php

namespace VanEgmond\MetaYaml\NodeValidator;

interface NodeValidatorInterface
{
    public function validate($name, $node, $data);
}
