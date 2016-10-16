<?php

namespace GraphAware\Common\Result;

/*
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
    /**
     * @param StatementInterface $statement
     */
    public function __construct(StatementInterface $statement);

    /**
     * @return StatementInterface
     */
    public function statement();

    /**
     * @return ResultSummaryInterface
     */
    public function summarize();

    /**
     * @return bool
     */
    public function hasSummary();

    /**
     * @return Record[]
     */
    public function records();

    /**
     * @return bool
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
     * @return Record
     * @throws \RuntimeException When there is no record
     */
    public function firstRecord();

    /**
     * Returns the first record of the result or the given default if the Record cursor is empty
     *
     * @param mixed $default
     * @return mixed|Record
     */
    public function firstRecordOrDefault($default);
}
