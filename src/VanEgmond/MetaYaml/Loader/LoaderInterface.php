<?php

namespace VanEgmond\MetaYaml\Loader;

interface LoaderInterface
{
    public function load($string);

    public function loadFromFile($filename);
}
