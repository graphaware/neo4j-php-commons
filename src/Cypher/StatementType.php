<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace GraphAware\Common\Cypher;

use MyCLabs\Enum\Enum;

final class StatementType extends Enum
{
    const WRITE = "STATEMENT_WRITE";

    const READ = "STATEMENT_READ";

    public static function AS_WRITE()
    {
        return new StatementType(StatementType::WRITE);
    }

    public static function AS_READ()
    {
        return new StatementType(StatementType::READ);
    }
}