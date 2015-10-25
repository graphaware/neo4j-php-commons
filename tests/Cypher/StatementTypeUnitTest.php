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

use GraphAware\Common\Cypher\StatementType;

/**
 * @group unit
 * @group cypher
 * @group tck
 */
class StatementTypeUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testStatementTypeStrings()
    {
        $this->assertEquals("STATEMENT_WRITE", StatementType::WRITE);
        $this->assertEquals("STATEMENT_READ", StatementType::READ);
    }

    public function testStatementTypeObjects()
    {
        $this->assertInstanceOf(StatementType::class, StatementType::AS_WRITE());
        $this->assertEquals("STATEMENT_WRITE", StatementType::AS_WRITE());
        $this->assertInstanceOf(StatementType::class, StatementType::AS_READ());
        $this->assertEquals("STATEMENT_READ", StatementType::AS_READ());
        $this->assertEquals(StatementType::READ, StatementType::AS_READ());
        $this->assertEquals(StatementType::WRITE, StatementType::AS_WRITE());
    }
}