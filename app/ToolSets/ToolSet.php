<?php

namespace App\ToolSets;

use Illuminate\Support\Collection;
use IteratorAggregate;

interface ToolSet extends IteratorAggregate
{
    public function tools(): Collection;
}
