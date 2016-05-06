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

interface NodeInterface extends MapAccessorInterface, IdentityInterface
{
    /**
     * Returns all labels of the node.
     *
     * @return string[]
     */
    public function labels();

    /**
     * @param string $label
     *
     * @return bool
     */
    public function hasLabel($label);
}
