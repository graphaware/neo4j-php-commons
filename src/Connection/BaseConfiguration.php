<?php

namespace GraphAware\Common\Connection;

use GraphAware\Common\Driver\ConfigInterface;

/**
 * A shared configuration class between connection. The configuration class is immutable.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class BaseConfiguration implements ConfigInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * Init the configuration with some data.
     *
     * @param array $data
     */
    protected function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Factory function for the configuration.
     *
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @param string $name
     * @param mixed  $default value when $name is not defined
     *
     * @return mixed
     */
    public function getValue($name, $default = null)
    {
        if (!isset($this->data[$name])) {
            return $default;
        }

        return $this->data[$name];
    }

    /**
     * Does the data exist in the configuration?
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasValue($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * Create a new Configuration with a new $value for key $name.
     * Any existing value for $name will be replaced in the new Configuration instance.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return static
     */
    public function setValue($name, $value)
    {
        $new = clone $this;
        $new->data[$name] = $value;

        return $new;
    }
}
