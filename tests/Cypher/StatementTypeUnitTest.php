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
        $this->assertEquals("STATEMENT_READ_WRITE", StatementType::READ_WRITE);
        $this->assertEquals("STATEMENT_READ_ONLY", StatementType::READ_ONLY);
    }

    public function testStatementTypeObjects()
    {
        $this->assertInstanceOf(StatementType::class, StatementType::AS_WRITE_ONLY());
        $this->assertEquals("STATEMENT_WRITE_ONLY", StatementType::AS_WRITE_ONLY());
        $this->assertInstanceOf(StatementType::class, StatementType::AS_READ_ONLY());
        $this->assertEquals("STATEMENT_READ_ONLY", StatementType::AS_READ_ONLY());
        $this->assertEquals(StatementType::READ_ONLY, StatementType::AS_READ_ONLY());
        $this->assertEquals(StatementType::SCHEMA_WRITE, StatementType::AS_SCHEMA_WRITE());
    }
}