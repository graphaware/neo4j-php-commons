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
use GraphAware\Common\Result\RecordViewInterface;

interface RecordCursorInterface
{
    public function __construct(StatementInterface $statement);

    /**
     * @return \GraphAware\Common\Cypher\Statement
     */
    public function statement();

    /**
     * @return \GraphAware\Common\Result\ResultSummaryInterface
     */
    public function summarize();

    /**
     * @return boolean
     */
    public function hasSummary();

    /**
     * @return \GraphAware\Common\Result\RecordViewInterface[]
     */
    public function records();

    /**
     * @return boolean
     */
    public function isOpen();

    /**
     * @void
     */
    public function close();

    /**
     * @return \GraphAware\Common\Result\RecordViewInterface
     */
    public function next();

    /**
     * @return int
     */
    public function position();

    /**
     * @void
     */
    public function skip();

    /**
     * @return boolean
     */
    public function isLast();

    /**
     * @return \GraphAware\Common\Result\RecordViewInterface
     */
    public function first();

    public function single();

    public function last();
}