<?php

namespace Core\Lib;

use Interop\Container\ContainerInterface;

class BaseController
{

    public $container = null;

    public $db = null;

    public function __construct(ContainerInterface $container)
    {
        if ($this->container === null) {
            $this->container = $container;
        }
    }
}