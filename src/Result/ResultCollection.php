<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Result;

class ResultCollection implements \ArrayAccess
{
    /**
     * @var \GraphAware\Common\Result\RecordCursorInterface[]
     */
    protected $results = [];

    /**
     * Add a Result <code>RecordCursorInterface</code> to the ResultCollection.
     *
     * @param \GraphAware\Common\Result\RecordCursorInterface $recordCursor
     */
    public function add(RecordCursorInterface $recordCursor)
    {
        $this->results[] = $recordCursor;
    }

    /**
     * Returns a RecordCursorInterface (Result) for the given tag (tag passed along with the Cypher statement).
     *
     * @param string $tag
     * @return \GraphAware\Common\Result\RecordCursorInterface|null
     */
    public function get($tag)
    {
        foreach ($this->results as $result) {
            if ($result->statement()->getTag() === $tag) {
                return $result;
            }
        }
    }

    /**
     * Returns the size of the results of this ResultCollection.
     *
     * @return int
     */
    public function size()
    {
        return count($this->results);
    }

    public function offsetExists($offset)
    {
        return isset($this->results[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->results[$offset]) ? $this->results[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        // records can only be added via the add() method
    }

    public function offsetUnset($offset)
    {
        // This class doesn't support removal of objects
    }


}