<?php

namespace GraphAware\Common\Driver;

interface PipelineInterface
{
    /**
     * @param string $query
     * @param array  $parameters
     * @param null   $tag
     */
    public function push($query, array $parameters = array(), $tag = null);

    /**
     * @return \GraphAware\Common\Result\ResultCollection
     */
    public function run();
}
