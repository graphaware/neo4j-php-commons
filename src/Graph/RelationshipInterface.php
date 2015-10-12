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

interface RelationshipInterface extends PropertyBagInterface
{
    public function getId();

    public function getStartNode();

    public function getEndNode();

    public function getNodes();

    public function getType();

    public function isType(RelationshipType $relationshipType);

    public function getOtherNode(NodeInterface $node);

    public function getDirection(NodeInterface $node);
}