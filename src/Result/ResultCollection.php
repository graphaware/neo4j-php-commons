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

class ResultCollection
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
}