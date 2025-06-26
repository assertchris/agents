<?php

namespace App\Agents;

use App\Agents\Concerns\RespondsConcern;
use App\Prompts\AgentPrompts\FormattingAgentPrompt;
use App\Prompts\Prompt;
use Prism\Prism\Enums\Provider;

class FormattingAgent implements Agent
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
        return resolve(FormattingAgentPrompt::class);
    }

    public function tools(): array
    {
        return [];
    }

    public function steps(): int
    {
        return 10;
    }
}
