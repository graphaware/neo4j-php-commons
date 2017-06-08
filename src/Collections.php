<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common;

use GraphAware\Common\Collection\ArrayList;
use GraphAware\Common\Collection\Map;

/**
 * Helper class for creating wrappers around arrays as there is no possibility in php
 * to define if an empty array should be sent as a map or as list via Cypher.
 */
class Collections
{
    /**
     * @param array $elements
     *
     * @return Map
     */
    public static function asMap(array $elements)
    {
        return new Map($elements);
    }

    /**
     * @param array $elements
     *
     * @return ArrayList
     */
    public static function asList(array $elements)
    {
        return new ArrayList($elements);
    }
}