<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Tests\Graph;

use GraphAware\Common\Graph\Node;
use GraphAware\Common\Graph\Label;
use GraphAware\Common\Graph\NodeInterface;
use GraphAware\Common\Graph\PropertyBagInterface;

/**
 * @group unit
 * @group graph
 */
class NodeUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testNewInstance()
    {
        $node = new Node(1);
        $this->assertInstanceOf(NodeInterface::class, $node);
        $this->assertInstanceOf(PropertyBagInterface::class, $node);
        $this->assertEquals(1, $node->getId());
        $this->assertCount(0, $node->getProperties());
        $this->assertCount(0, $node->getLabels());
        $this->assertCount(0, $node->getRelationships());
        $this->assertFalse($node->hasLabel("Cool"));
        $this->assertFalse($node->hasRelationships());
    }

    public function testNodeWithLabels()
    {
        $node = new Node(1, array("User", "Person"));
        $this->assertCount(2, $node->getLabels());
        $this->assertInstanceOf(Label::class, $node->getLabels()[0]);
        $this->assertEquals("User", $node->getLabels()[0]);
        $this->assertEquals("Person", $node->getLabels()[1]);
        $this->assertTrue($node->hasLabel("Person"));
    }
}