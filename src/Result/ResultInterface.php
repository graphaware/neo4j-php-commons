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

interface ResultInterface
{
    public function __construct(StatementInterface $statement);

    public function addRecord(RecordInterface $record);

    public function summarize();

    public function updateStatistics();

    public function statementType();

    public function hasSummary();
}