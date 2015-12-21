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
    public function text();

    public function parameters();

    public function withText($text);

    public function withParameters(array $parameters);

    public function withUpdatedParameters(array $parameters);
}