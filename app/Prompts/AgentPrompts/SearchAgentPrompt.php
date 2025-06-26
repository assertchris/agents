<?php

namespace App\Prompts\AgentPrompts;

use App\Prompts\Concerns\StringableConcern;
use App\Prompts\Prompt;

class SearchAgentPrompt implements Prompt
{
    use StringableConcern;

    public function prompt(): string
    {
        return <<<'PROMPT'
            You're an expert in searching for things on Google. You have all the tools
            at your disposal to turn a search query into a list of results, straight from
            Google!
        PROMPT;
    }
}
