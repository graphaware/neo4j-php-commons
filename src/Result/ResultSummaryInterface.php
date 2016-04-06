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

interface ResultSummaryInterface
{
    /**
     * ResultSummaryInterface constructor.
     *
     * @param \GraphAware\Common\Cypher\StatementInterface $statement
     */
    public function __construct(StatementInterface $statement);

    /**
     * @return \GraphAware\Common\Cypher\StatementInterface
     */
    public function statement();

    /**
     * @return \GraphAware\Common\Result\StatementStatistics
     */
    public function updateStatistics();

    /**
     * @return array
     */
    public function notifications();

    /**
     * @return string
     */
    public function statementType();
}