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

/**
 * Node representation class.
 */
class Node extends PropertyBag implements NodeInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var \GraphAware\Common\Graph\Label[]
     */
    protected $labels = [];

    /**
     * @var array
     */
    protected $relationships;

    /**
     * @param int $id
     * @param array $labels
     * @param array $relationships
     */
    public function __construct($id, array $labels = array(), array $relationships = array())
    {
        $this->id = $id;
        foreach ($labels as $label) {
            $this->labels[] = Label::label($label);
        }
        $this->relationships = $relationships;
        parent::__construct();
    }

    /**
     * Returns the node internal id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the node labels
     *
     * @return \GraphAware\Common\Graph\Label[]
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Returns whether or not the node has the given <code>$name</code> label
     *
     * @param string $name
     * @return bool
     */
    public function hasLabel($name)
    {
        return in_array($name, $this->labels);
    }

    /**
     * Returns the node relationships
     *
     * @return array
     */
    public function getRelationships()
    {
        return $this->relationships;
    }

    /**
     * Returns whether or not the node has relationships
     *
     * @return bool
     */
    public function hasRelationships()
    {
        return !empty($this->relationships);
    }
}