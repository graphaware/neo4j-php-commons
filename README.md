# GraphAware PHP Neo4j Common

## Library with common utility classes for Neo4j

[![Build Status](https://travis-ci.org/graphaware/neo4j-php-commons.svg)](https://travis-ci.org/graphaware/neo4j-php-commons)

### Installation

Require the dependencies in your application :

```bash
composer require graphaware/neo4j-common
```

---

### Graph

#### Direction (Enum) : representation of a Relationship Direction

```php

use GraphAware\Common\Graph\Direction;

$direction = new Direction(Direction::INCOMING);
echo $direction; // Returns (string) "INCOMING"

// Or static call construction

$direction = Direction::OUTGOING;
echo $direction; // Returns (string) "OUTGOING"
```

Valid values are `INCOMING`, `OUTGOING` and `BOTH`.

#### RelationshipType

Object representation of a relationship type.

```php
use GraphAware\Common\Graph\RelationshipType;

$relType = RelationshipType::withName("FOLLOWS");
echo $relType->getName(); // Returns (string) "FOLLOWS"
echo (string) $relType; // implements __toString method : Returns (string) "FOLLOWS"
```
---

### Cypher

#### Statement and StatementCollection

Utility classes representing Cypher's statements. Both `Statement` and `StatementCollection` classes are 
`taggable`.

Contains also `StatementInterface` and `StatementCollectionInterface` used in most GraphAware's PHP libraries.

##### Statement

Represents a Cypher statement with a query and an array of parameters. Also the Statement accepts a `tag` argument default to null;

```php

use GraphAware\Common\Cypher\Statement;

$statement = Statement::create("MATCH (n) WHERE id(n) = {id} RETURN n", array("id" => 324));

echo $statement->getQuery(); // Returns (string) "MATCH (n) WHERE id(n) = {id} RETURN n"
echo count($statement->getParameters()); // Returns (int) 1
```

##### StatementCollection

Represents a collection of `Statement` objects. Is also Taggable.

```php

use GraphAware\Common\Cypher\Statement
    GraphAware\Common\Cypher\StatementCollection;

$collection = new StatementCollection();
$collection->add(Statement::create("MATCH (n) RETURN count(n)"));

print_r($collection->getStatements());
echo $collection->isEmpty();
```

---

## License

### Apache License 2.0

```
Copyright 2015 Graphaware Limited

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
```

--- 

## Support

Standard Community Support through the Github Issues and PR's workflow.

Enterprise support via your first level support contact.