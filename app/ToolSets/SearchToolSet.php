<?php

namespace App\ToolSets;

use App\ToolSets\Concerns\IteratorAggregateConcern;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Prism\Prism\Facades\Tool;
use Throwable;

class SearchToolSet implements ToolSet
{
    use IteratorAggregateConcern;

    public function tools(): Collection
    {
        return collect([
            Tool::as('search_tool')
                ->for('Searches on Google')
                ->withStringParameter('query', 'The query to search with')
                ->using($this->googleSearch(...)),
        ]);
    }

    public function googleSearch(string $query): string
    {
        $key = env('SERP_API_KEY');

        try {
            return (string) Http::get("https://serpapi.com/search.json?engine=google&q={$query}&api_key={$key}")
                ->getBody();
        } catch (Throwable $e) {
            return $e->getMessage();
        }

    }
}
