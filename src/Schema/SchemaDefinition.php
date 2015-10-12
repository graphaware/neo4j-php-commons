<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Schema;

use GraphAware\Common\Graph\Label;

class SchemaDefinition
{
    /**
     * @var \GraphAware\Common\Schema\IndexDefinition[]
     */
    protected $indexes = [];

    /**
     * @param \GraphAware\Common\Schema\IndexDefinition $index
     */
    public function addIndex(IndexDefinition $index)
    {
        $this->indexes[] = $index;
    }

    /**
     * Returns all Indexes of the Schema
     *
     * @return \GraphAware\Common\Schema\IndexDefinition[]
     */
    public function getIndexes()
    {
        return $this->indexes;
    }

    /**
     * Returns whether or not the Schema contains Indexes
     *
     * @return bool
     */
    public function hasIndexes()
    {
        return !empty($this->indexes);
    }

    /**
     * Returns whether or not the Schema contains an Index for the given <code>Label</code> and <code>property</code> combination.
     *
     * @param \GraphAware\Common\Graph\Label $label
     * @param $property
     * @return bool
     */
    public function hasIndex(Label $label, $property)
    {
        foreach ($this->indexes as $index) {
            if ($index->getLabel()->getName() === $label->getName() && $index->getProperty() === $property) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns whether or not the Schema contains Indexes with Uniqueness ConstraintType
     *
     * @return bool
     */
    public function hasUniqueConstraints()
    {
        foreach ($this->indexes as $index) {
            if ($index->isUnique()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return \GraphAware\Common\Schema\Index[]
     */
    public function getUniqueConstraints()
    {
        $indexes = [];
        foreach ($this->indexes as $index) {
            if ($index->isUnique()) {
                $indexes[] = $index;
            }
        }

        return $indexes;
    }
}