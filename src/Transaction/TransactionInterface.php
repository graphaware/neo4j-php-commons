<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Transaction;

use GraphAware\Common\Cypher\Statement;

interface TransactionInterface
{
    public function isOpen();

    public function isCommited();

    public function isRolledBack();

    public function getStatus();

    public function run(Statement $statement);

    public function success();

    public function rollback();
}