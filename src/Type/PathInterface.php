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

interface PathInterface
{
    /**
     * Returns the start node of the path
     *
     * @return \GraphAware\Common\Type\NodeInterface
     */
    function start();

    /**
     * Returns the end node of the path
     *
     * @return \GraphAware\Common\Type\NodeInterface
     */
    function end();

    /**
     * Returns the length of the path
     *
     * @return int
     */
    function length();

    /**
     * Returns whether or not the path contains the given node
     *
     * @param \GraphAware\Common\Type\NodeInterface $node
     * @return bool
     */
    function containsNode(NodeInterface $node);

    /**
     * Returns whether or not the path contains the given relationship
     *
     * @param \GraphAware\Common\Type\RelationshipInterface $relationship
     * @return bool
     */
    function containsRelationship(RelationshipInterface $relationship);

    /**
     * Returns the nodes in the path, nodes will appear in the same order as they appear in the path
     *
     * @return \GraphAware\Common\Type\NodeInterface[]
     */
    function nodes();

    /**
     * Returns the relationships in the path, relationships will appear in the same order as they appear in the path
     *
     * @return \GraphAware\Common\Type\RelationshipInterface[]
     */
    function relationships();
}