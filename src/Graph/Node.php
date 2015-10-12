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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \GraphAware\Common\Graph\Label[]
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param $name
     * @return bool
     */
    public function hasLabel($name)
    {
        return in_array($name, $this->labels);
    }

    /**
     * @return array
     */
    public function getRelationships()
    {
        return $this->relationships;
    }

    /**
     * @return bool
     */
    public function hasRelationships()
    {
        return !empty($this->relationships);
    }
}