<?php

namespace App\Agents;

use App\Agents\Concerns\RespondsConcern;
use App\Prompts\AgentPrompts\JiraAgentPrompt;
use App\ToolSets\JiraCustomToolSet;
use App\ToolSets\JiraMCPToolSet;
use Prism\Prism\Enums\Provider;

class JiraAgent implements Agent
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

    public function prompt(): JiraAgentPrompt
    {
        return resolve(JiraAgentPrompt::class);
    }

    public function tools(): array
    {
        return [
            ...resolve(JiraMCPToolSet::class),
            ...resolve(JiraCustomToolSet::class),
        ];
    }

    public function steps(): int
    {
        return 10;
    }
}
