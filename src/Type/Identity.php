<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace GraphAware\Common\Type;

interface Identity
{
    /**
     * Returns the identity identifier of the object.
     *
     * @return int
     */
    public function identity();
}
