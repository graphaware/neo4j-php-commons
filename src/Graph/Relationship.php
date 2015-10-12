<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Graph;

class Relationship extends PropertyBag implements RelationshipInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var \GraphAware\Common\Graph\RelationshipType
     */
    protected $type;

    /**
     * @var \GraphAware\Common\Graph\NodeInterface
     */
    protected $startNode;

    /**
     * @var \GraphAware\Common\Graph\NodeInterface
     */
    protected $endNode;

    /**
     * @param int $id
     * @param \GraphAware\Common\Graph\RelationshipType $relationshipType
     * @param \GraphAware\Common\Graph\NodeInterface $startNode
     * @param \GraphAware\Common\Graph\NodeInterface $endNode
     */
    public function __construct($id, RelationshipType $relationshipType, NodeInterface $startNode, NodeInterface $endNode)
    {
        $this->id = $id;
        $this->type = $relationshipType;
        $this->startNode = $startNode;
        $this->endNode = $endNode;
        parent::__construct();
    }

    /**
     * Returns the Relationship internal id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the Relationship type
     *
     * @return RelationshipType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the start node of the Relationship
     *
     * @return \GraphAware\Common\Graph\NodeInterface
     */
    public function getStartNode()
    {
        return $this->startNode;
    }

    /**
     * Returns the end node of the Relationship
     *
     * @return \GraphAware\Common\Graph\NodeInterface
     */
    public function getEndNode()
    {
        return $this->endNode;
    }

    /**
     * Returns the other node of the Relationship, based on the given <code>Node</code>.
     *
     * @param \GraphAware\Common\Graph\NodeInterface $node
     * @return \GraphAware\Common\Graph\NodeInterface
     *
     * @throws \InvalidArgumentException When the given node does not make part of the Relationship
     */
    public function getOtherNode(NodeInterface $node)
    {
        if ($node->getId() === $this->startNode->getId()) {
            return $this->endNode;
        } elseif ($node->getId() === $this->endNode->getId()) {
            return $this->startNode;
        }

        throw new \InvalidArgumentException(sprintf(
            'The node with ID "%s" is not part of the relationship with ID "%s"',
            $node->getId(),
            $this->id
        ));
    }

    /**
     * Returns the direction of the Relationship for a <code>Node</code> point of view
     *
     * @param \GraphAware\Common\Graph\NodeInterface $node
     */
    public function getDirection(NodeInterface $node)
    {
        if ($node !== $this->startNode && $node !== $this->endNode) {
            throw new \InvalidArgumentException(sprintf('The given node is not part of the Relationship'));
        }

        $direction = $node === $this->startNode ? Direction::OUTGOING() : Direction::INCOMING();

        return $direction;
    }

    /**
     * Returns the nodes bound to this Relationship.
     *
     * @return \GraphAware\Common\Graph\NodeInterface[]
     */
    public function getNodes()
    {
        return array($this->startNode, $this->endNode);
    }

    /**
     * Returns whether or not the Relationship is of the given <code>relationshipType</code>.
     *
     * @param \GraphAware\Common\Graph\RelationshipType $relationshipType
     * @return bool
     */
    public function isType(RelationshipType $relationshipType)
    {
        return $relationshipType->getName() === $this->type->getName();
    }
}