<?php

namespace App\Prompts\AgentPrompts;

use App\Prompts\Concerns\StringableConcern;
use App\Prompts\Prompt;

class InternAgentPrompt implements Prompt
{
    use StringableConcern;

    public function prompt(): string
    {
        return <<<'PROMPT'
            You're our newest and brightest intern. I'll ask you to perform simple tasks, and you'll
            use your smarts and tools to achieve them.

            P.S: Please format your answers using your tools. You don't need to tell me you've formatted
            (or failed to format) the response. Just do it and give the formatted response to me.
        PROMPT;
    }
}
