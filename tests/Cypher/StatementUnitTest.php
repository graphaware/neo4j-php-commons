<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Tests\Cypher;

use GraphAware\Common\Cypher\Statement;
use GraphAware\Common\Cypher\StatementCollection;

/**
 * @group unit
 * @group cypher
 */
class StatementUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testStatementInstance()
    {
        $q = $this->getQuery();
        $st = Statement::create($q);
        $this->assertInstanceOf(Statement::class, $st);
        $this->assertEquals($q, $st->getQuery());
        $this->assertCount(0, $st->getParameters());
        $this->assertFalse($st->hasTag());
    }

    public function testStatementWithParams()
    {
        $st = Statement::create($this->getQuery(), $this->getParams());
        $this->assertCount(1, $st->getParameters());
    }

    public function testStatementTagged()
    {
        $st = Statement::create($this->getQuery(), $this->getParams(), "test");
        $this->assertEquals("test", $st->getTag());
        $this->assertTrue($st->hasTag());
    }

    private function getQuery()
    {
        $q = "MATCH (n) RETURN count(n)";

        return $q;
    }

    private function getParams()
    {
        return array('id' => 1);
    }
}