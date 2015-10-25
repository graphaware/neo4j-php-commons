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
    const READ_ONLY = "STATEMENT_READ_ONLY";

    const READ_WRITE = "STATEMENT_READ_WRITE";

    const WRITE_ONLY = "STATEMENT_WRITE_ONLY";

    const SCHEMA_WRITE = "STATEMENT_SCHEMA_WRITE";

    public static function AS_READ_ONLY()
    {
        return new StatementType(StatementType::READ_ONLY);
    }

    public static function AS_READ_WRITE()
    {
        return new StatementType(StatementType::READ_WRITE);
    }

    public static function AS_WRITE_ONLY()
    {
        return new StatementType(StatementType::WRITE_ONLY);
    }

    public static function AS_SCHEMA_WRITE()
    {
        return new StatementType(StatementType::SCHEMA_WRITE);
    }
}