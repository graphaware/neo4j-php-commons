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

abstract class AbstractResult implements ResultInterface
{
    /**
     * @var \GraphAware\Common\Cypher\StatementInterface
     */
    protected $statement;

    /**
     * @param \GraphAware\Common\Cypher\StatementInterface $statement
     */
    public function __construct(StatementInterface $statement)
    {
        $this->statement = $statement;
    }
}