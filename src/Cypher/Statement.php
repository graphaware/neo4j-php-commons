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
    protected $text;

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
     * @param string $text
     * @param array $parameters
     * @param string|null $tag
     * @param StatementType
     */
    private function __construct($text, array $parameters = array(), $tag = null, StatementType $statementType)
    {
        $this->text = (string) $text;
        $this->parameters = $parameters;
        $this->type = $statementType;
        if (null !== $tag) {
            $this->tag = (string) $tag;
        }
    }

    /**
     * @param string $text
     * @param array $parameters
     * @param string|null $tag
     * @param string $statementType
     * @return \GraphAware\Common\Cypher\Statement
     */
    public static function create($text, array $parameters = array(), $tag = null, $statementType = StatementType::READ_WRITE)
    {
        if (!StatementType::isValid($statementType)) {
            throw new \InvalidArgumentException(sprintf('Value %s is invalid as statement type, possible values are %s', $statementType, json_encode(StatementType::keys())));
        }
        $type = new StatementType($statementType);
        return new self($text, $parameters, $tag, $type);
    }

    /**
     * @return string
     */
    public function text()
    {
        return $this->text;
    }

    /**
     * @return array
     */
    public function parameters()
    {
        return $this->parameters;
    }

    /**
     * @param string $text
     * @return \GraphAware\Common\Cypher\Statement
     */
    public function withText($text)
    {
        return new self($text, $this->parameters, $this->tag, $this->type);
    }

    /**
     * @param array $parameters
     * @return \GraphAware\Common\Cypher\Statement
     */
    public function withParameters(array $parameters)
    {
        return new self($this->text, $parameters, $this->tag, $this->type);
    }

    /**
     * @param array $parameters
     * @return \GraphAware\Common\Cypher\Statement
     */
    public function withUpdatedParameters(array $parameters)
    {
        $parameters = array_merge($this->parameters, $parameters);

        return new self($this->text, $parameters, $this->tag, $this->type);
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
    public function statementType()
    {
        return $this->type;
    }
}