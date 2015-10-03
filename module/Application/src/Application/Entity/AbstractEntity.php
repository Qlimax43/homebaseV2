<?php

namespace Application\Entity;

/**
 * Abstraction layer for functions that every entity should have
 *
 * @author Lars
 */
class AbstractEntity
{
    /**
     * Return all properties as array instead of object
     * @return array The properties in a associative array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
