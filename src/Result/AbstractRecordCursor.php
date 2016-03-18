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

use GraphAware\Common\Cypher\StatementInterface;

abstract class AbstractRecordCursor implements RecordCursorInterface
{
    /**
     * @var \GraphAware\Common\Cypher\StatementInterface
     */
    protected $statement;

    /**
     * @var array
     */
    protected $records = [];

    /**
     * @var \GraphAware\Common\Result\ResultSummaryInterface
     */
    protected $resultSummary;

    /**
     * @var bool
     */
    protected $isOpen = true;

    /**
     * @var int
     */
    protected $position = -1;

    /**
     * @param \GraphAware\Common\Cypher\StatementInterface $statement
     */
    public function __construct(StatementInterface $statement)
    {
        $this->statement = $statement;
    }

    /**
     * @return \GraphAware\Common\Cypher\StatementInterface
     */
    public function statement()
    {
        return $this->statement;
    }

    /**
     * @param \GraphAware\Common\Result\RecordViewInterface $record
     */
    public function addRecord(RecordViewInterface $record)
    {
        $this->records[] = $record;
    }

    /**
     * @return \GraphAware\Common\Result\RecordViewInterface[]
     */
    public function records()
    {
        return $this->records;
    }

    /**
     * @param \GraphAware\Common\Result\ResultSummaryInterface $resultSummary
     */
    public function setResultSummary(ResultSummaryInterface $resultSummary)
    {
        $this->resultSummary = $resultSummary;
    }

    /**
     * @return \GraphAware\Common\Result\ResultSummaryInterface
     */
    public function summarize()
    {
        return $this->resultSummary;
    }

    /**
     * @return bool
     */
    public function hasSummary()
    {
        return $this->resultSummary instanceof ResultSummaryInterface;
    }

    /**
     * @return bool
     */
    public function isOpen()
    {
        return $this->isOpen;
    }

    /**
     * @void
     */
    public function close()
    {
        $this->isOpen = false;
    }

    /**
     * @return bool
     */
    public function next()
    {
        if (false !== current($this->records)) {
            ++$this->position;

            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function first()
    {
        return -1 === $this->position && $this->next() ? true : false;
    }

    /**
     * @return bool
     */
    public function single()
    {
        return $this->first() && $this->isLast();
    }

    /**
     * @return bool
     */
    public function last()
    {
        while ($this->next()) {}

        return $this->position !== -1;
    }

    /**
     * @return bool
     */
    public function isLast()
    {
        return $this->position === count($this->records) -1;
    }
}