<?php

namespace App\ToolSets;

use App\ToolSets\Concerns\IteratorAggregateConcern;
use Illuminate\Support\Collection;
use Prism\Relay\Facades\Relay;

class DocumentationMCPToolSet implements ToolSet
{
    use IteratorAggregateConcern;

    public function tools(): Collection
    {
        return collect(Relay::tools('context7'));
    }
}
