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
     * @var \GraphAware\Common\Cypher\StatementType
     */
    protected $type;

    /**
     * @param string $query
     * @param array $parameters
     * @param StatementType
     * @param string|null $tag
     */
    private function __construct($query, array $parameters = array(), $tag = null, StatementType $statementType)
    {
        $this->query = (string) $query;
        $this->parameters = $parameters;
        $this->type = $statementType;
        if (null !== $tag) {
            $this->tag = (string) $tag;
        }
    }

    /**
     * @param string $query
     * @param array $parameters
     * @param string $statementType
     * @param string|null $tag
     * @return \GraphAware\Common\Cypher\Statement
     */
    public static function create($query, array $parameters = array(), $tag = null, $statementType = StatementType::WRITE)
    {
        if (!StatementType::isValid($statementType)) {
            throw new \InvalidArgumentException(sprintf('Value %s is invalid as statement type, possible values are %s', $statementType, json_encode(StatementType::keys())));
        }
        $type = new StatementType($statementType);
        return new self($query, $parameters, $tag, $type);
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

    /**
     * @return \GraphAware\Common\Cypher\StatementType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isWriteType()
    {
        return $this->type === StatementType::WRITE;
    }

    /**
     * @return bool
     */
    public function isReadType()
    {
        return $this->type === StatementType::READ;
    }
}