<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Cypher;

class StatementCollection implements StatementCollectionInterface
{
    /**
     * @var \GraphAware\Common\Cypher\Statement[]
     */
    protected $statements = [];

    /**
     * @var null|string
     */
    protected $tag;

    /**
     * @param null|string $tag
     */
    public function __construct($tag = null)
    {
        $this->tag = null !== $tag ? (string) $tag : null;
    }

    /**
     * @return \GraphAware\Common\Cypher\Statement[]
     */
    public function getStatements()
    {
        return $this->statements;
    }

    /**
     * @param \GraphAware\Common\Cypher\StatementInterface $statement
     */
    public function add(StatementInterface $statement)
    {
        $this->statements[] = $statement;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->statements);
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return count($this->statements);
    }

    /**
     * @return null|string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @return bool
     */
    public function hasTag()
    {
        return null !== $this->tag;
    }
}