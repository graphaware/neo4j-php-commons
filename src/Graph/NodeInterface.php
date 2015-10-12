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

interface NodeInterface extends PropertyBagInterface
{
    public function getLabels();

    public function hasLabel($name);

    public function getId();

    public function getRelationships();

    public function hasRelationships();

    public function addRelationship(RelationshipInterface $relationship);
}