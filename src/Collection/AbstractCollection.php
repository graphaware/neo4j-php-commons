<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Collection;

abstract class AbstractCollection implements CollectionInterface
{
    /** @var array  */
    protected $elements = [];

    /**
     * @param array $elements
     */
    public function __construct(array $elements)
    {
        $this->elements = $elements;
    }

    /**
     * @param array $elements
     */
    public function setElements(array $elements)
    {
        $this->elements = $elements;
    }

    /**
     * @return array
     */
    public function getElements()
    {
        return $this->elements;
    }

}