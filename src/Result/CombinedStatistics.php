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

use GraphAware\Common\Result\StatementStatisticsInterface;

class CombinedStatistics implements StatementStatisticsInterface
{
    /**
     * @var bool
     */
    protected $containsUpdates = false;

    /**
     * @var int
     */
    protected $nodesCreated = 0;

    /**
     * @var int
     */
    protected $nodesDeleted = 0;

    /**
     * @var int
     */
    protected $relationshipsCreated = 0;

    /**
     * @var int
     */
    protected $relationshipsDeleted = 0;

    /**
     * @var int
     */
    protected $propertiesSet = 0;

    /**
     * @var int
     */
    protected $labelsAdded = 0;

    /**
     * @var int
     */
    protected $labelsRemoved = 0;

    /**
     * @var int
     */
    protected $indexesAdded = 0;

    /**
     * @var int
     */
    protected $indexesRemoved = 0;

    /**
     * @var int
     */
    protected $constraintsAdded = 0;

    /**
     * @var int
     */
    protected $constraintsRemoved = 0;

    /**
     * @param \GraphAware\Common\Result\StatementStatisticsInterface $resultStats
     */
    public function mergeStats(StatementStatisticsInterface $resultStats)
    {
        if (!$this->containsUpdates) {
            $this->containsUpdates = $resultStats->containsUpdates();
        }
        $this->nodesCreated += $resultStats->nodesCreated();
        $this->nodesDeleted += $resultStats->nodesDeleted();
        $this->relationshipsCreated += $resultStats->relationshipsCreated();
        $this->relationshipsDeleted += $resultStats->relationshipsDeleted();
        $this->propertiesSet += $resultStats->propertiesSet();
        $this->labelsAdded += $resultStats->labelsAdded();
        $this->labelsRemoved += $resultStats->labelsRemoved();
        $this->indexesAdded += $resultStats->indexesAdded();
        $this->indexesRemoved += $resultStats->indexesRemoved();
        $this->constraintsAdded += $resultStats->constraintsAdded();
        $this->constraintsRemoved += $resultStats->constraintsRemoved();
    }

    /**
     * @return bool
     */
    public function containsUpdates()
    {
        return $this->containsUpdates;
    }

    /**
     * @return int
     */
    public function nodesCreated()
    {
        return $this->nodesCreated;
    }

    /**
     * @return int
     */
    public function nodesDeleted()
    {
        return $this->nodesDeleted;
    }

    /**
     * @return int
     */
    public function relationshipsCreated()
    {
        return $this->relationshipsCreated;
    }

    /**
     * @return int
     */
    public function relationshipsDeleted()
    {
        return $this->relationshipsDeleted;
    }

    /**
     * @return int
     */
    public function propertiesSet()
    {
        return $this->propertiesSet;
    }

    /**
     * @return int
     */
    public function labelsAdded()
    {
        return $this->labelsAdded;
    }

    /**
     * @return int
     */
    public function labelsRemoved()
    {
        return $this->labelsRemoved;
    }

    /**
     * @return int
     */
    public function indexesAdded()
    {
        return $this->indexesAdded;
    }

    /**
     * @return int
     */
    public function indexesRemoved()
    {
        return $this->labelsRemoved;
    }

    /**
     * @return int
     */
    public function constraintsAdded()
    {
        return $this->constraintsAdded;
    }

    /**
     * @return int
     */
    public function constraintsRemoved()
    {
        return $this->constraintsRemoved;
    }
}