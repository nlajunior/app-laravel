<?php

namespace core\Domain\Entity\Traits;

use Exception;

trait MethodsMagicsTrait
{
    public function __get($property)
    {
        if (isset($this->{$property})) {
            return $this->{$property};
        }

        $className = get_class($this);
        throw new Exception("Property {$property} not found in class {$className}");
    }
}
