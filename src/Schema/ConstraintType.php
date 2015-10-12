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

use MyCLabs\Enum\Enum;

class ConstraintType extends Enum
{
    const UNIQUENESS = "UNIQUENESS";

    const NODE_PROPERTY_EXISTENCE = "NODE_PROPERTY_EXISTENCE";

    const RELATIONSHIP_PROPERTY_EXISTENCE = "RELATIONSHIP_PROPERTY_EXISTENCE";

    /**
     * @return \GraphAware\Common\Schema\ConstraintType
     */
    public static function UNIQUENESS()
    {
        return new ConstraintType(self::UNIQUENESS);
    }

    /**
     * @return \GraphAware\Common\Schema\ConstraintType
     */
    public static function NODE_PROPERTY_EXISTENCE()
    {
        return new ConstraintType(self::NODE_PROPERTY_EXISTENCE);
    }

    /**
     * @return \GraphAware\Common\Schema\ConstraintType
     */
    public static function RELATIONSHIP_PROPERTY_EXISTENCE()
    {
        return new ConstraintType(self::RELATIONSHIP_PROPERTY_EXISTENCE);
    }
}