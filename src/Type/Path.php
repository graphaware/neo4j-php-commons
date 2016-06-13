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

interface Path
{
    /**
     * Returns the start node of the path.
     *
     * @return Node
     */
    public function start();

    /**
     * Returns the end node of the path.
     *
     * @return Node
     */
    public function end();

    /**
     * Returns the length of the path.
     *
     * @return int
     */
    public function length();

    /**
     * Returns whether or not the path contains the given node.
     *
     * @param Node $node
     *
     * @return bool
     */
    public function containsNode(Node $node);

    /**
     * Returns whether or not the path contains the given relationship.
     *
     * @param Relationship $relationship
     *
     * @return bool
     */
    public function containsRelationship(Relationship $relationship);

    /**
     * Returns the nodes in the path, nodes will appear in the same order as they appear in the path.
     *
     * @return Node[]
     */
    public function nodes();

    /**
     * Returns the relationships in the path, relationships will appear in the same order as they appear in the path.
     *
     * @return Relationship[]
     */
    public function relationships();
}
