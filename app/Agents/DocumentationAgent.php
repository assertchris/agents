<?php

namespace App\Agents;

use App\Agents\Concerns\RespondsConcern;
use App\Prompts\AgentPrompts\DocumentationAgentPrompt;
use App\Prompts\Prompt;
use App\ToolSets\DocumentationMCPToolSet;
use Prism\Prism\Enums\Provider;

class DocumentationAgent implements Agent
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
        return resolve(DocumentationAgentPrompt::class);
    }

    public function tools(): array
    {
        return [
            ...resolve(DocumentationMCPToolSet::class),
        ];
    }

    public function steps(): int
    {
        return 10;
    }
}
