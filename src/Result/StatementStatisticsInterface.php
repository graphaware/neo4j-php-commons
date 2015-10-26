<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Result;

interface StatementStatisticsInterface
{
    public function containsUpdates();

    public function nodesCreated();

    public function nodesDeleted();

    public function relationshipsCreated();

    public function relationshipsDeleted();

    public function propertiesSet();

    public function labelsAdded();

    public function labelsRemoved();

    public function indexesAdded();

    public function indexesRemoved();

    public function constraintsAdded();

    public function constraintsRemoved();
}