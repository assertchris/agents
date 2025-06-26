<?php

namespace App\Agents;

use App\Agents\Concerns\RespondsConcern;
use App\Prompts\AgentPrompts\InternAgentPrompt;
use App\Prompts\Prompt;
use App\ToolSets\InternToolSet;
use Prism\Prism\Enums\Provider;

class InternAgent implements Agent
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

    public function prompt(): Prompt
    {
        return resolve(InternAgentPrompt::class);
    }

    public function tools(): array
    {
        return [
            ...resolve(InternToolSet::class),
        ];
    }

    public function steps(): int
    {
        return 10;
    }
}
