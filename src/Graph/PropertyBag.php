<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Graph;

/**
 * PropertyBag is a Common API for handling both Nodes and Relationships properties.
 * It acts as a container for key/value pairs
 */
class PropertyBag
{
    /**
     * @var array
     */
    protected $properties;

    /**
     * @param array $properties
     */
    public function __construct(array $properties = array())
    {
        $this->properties = $properties;
    }

    /**
     * Returns a property value for the given <code>$key</code>. Throws an exception if not found.
     * If you want to provide a default value in case the property does not exist, use <code>get()</code> instead.
     *
     * @param $key
     * @return mixed
     *
     * @throws \InvalidArgumentException when the object has no property with the given <code>$key</code>
     */
    public function getProperty($key)
    {
        if (!array_key_exists($key, $this->properties)) {
            throw new \InvalidArgumentException(sprintf('No property with key "%s" found', $key));
        }

        return $this->properties[$key];
    }

    /**
     * Returns whether or not a property exist with the given <code>$key</code>
     *
     * @param string $key
     * @return bool
     */
    public function hasProperty($key)
    {
        return array_key_exists($key, $this->properties);
    }

    /**
     * Returns all properties of this bag
     *
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Sets a property value for the given <code>$key</code>
     *
     * @param string $key
     * @param mixed $value
     */
    public function setProperty($key, $value)
    {
        $this->properties[$key] = $value;
    }
}