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

class Statement implements StatementInterface
{
    /**
     * @var string
     */
    protected $query;

    /**
     * @var array
     */
    protected $parameters;

    /**
     * @var string|null
     */
    protected $tag = null;

    /**
     * @param string $query
     * @param array $parameters
     * @param string|null $tag
     */
    public function __construct($query, array $parameters = array(), $tag = null)
    {
        $this->query = (string) $query;
        $this->parameters = $parameters;
        if (null !== $tag) {
            $this->tag = (string) $tag;
        }
    }

    /**
     * @param string $query
     * @param array $parameters
     * @param string|null $tag
     * @return \GraphAware\Common\Cypher\Statement
     */
    public static function create($query, array $parameters = array(), $tag = null)
    {
        return new self($query, $parameters, $tag);
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
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