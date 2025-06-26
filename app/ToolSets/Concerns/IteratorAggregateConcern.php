<?php

namespace App\ToolSets\Concerns;

use Traversable;

trait IteratorAggregateConcern
{
    public function getIterator(): Traversable
    {
        return $this->tools();
    }
}
