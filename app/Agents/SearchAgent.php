<?php

namespace App\Agents;

use App\Agents\Concerns\RespondsConcern;
use App\Prompts\AgentPrompts\SearchAgentPrompt;
use App\ToolSets\SearchToolSet;
use Prism\Prism\Enums\Provider;

class SearchAgent implements Agent
{
    use RespondsConcern;

    public function provider(): Provider
    {
        return Provider::Anthropic;
    }

    public function model(): string
    {
        return 'claude-3-5-haiku-latest';
    }

    public function prompt(): SearchAgentPrompt
    {
        return resolve(SearchAgentPrompt::class);
    }

    public function tools(): array
    {
        return [
            ...resolve(SearchToolSet::class),
        ];
    }

    public function steps(): int
    {
        return 10;
    }
}
