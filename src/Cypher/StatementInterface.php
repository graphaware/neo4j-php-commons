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

interface StatementInterface
{
    /**
     * @return string
     */
    public function text();

    /**
     * @return array
     */
    public function parameters();

    /**
     * @return null|string
     */
    public function getTag();

    /**
     * @return bool
     */
    public function hasTag();

    /**
     * @return StatementType
     */
    public function statementType();

    /**
     * @param string $text
     *
     * @return StatementInterface
     */
    public function withText($text);

    /**
     * @param array $parameters
     *
     * @return StatementInterface
     */
    public function withParameters(array $parameters);

    /**
     * @param array $parameters
     *
     * @return StatementInterface
     */
    public function withUpdatedParameters(array $parameters);
}
