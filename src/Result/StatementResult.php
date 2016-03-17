<?php

namespace GraphAware\Common\Result;

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use GraphAware\Common\Cypher\StatementInterface;

interface StatementResult
{
    public function __construct(StatementInterface $statement);

    /**
     * @return \GraphAware\Common\Cypher\StatementInterface
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
     * @return \GraphAware\Common\Result\Record[]
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
     * @return int
     */
    public function size();

    /**
     * @return null|\GraphAware\Common\Result\Record
     */
    public function firstRecord();
}