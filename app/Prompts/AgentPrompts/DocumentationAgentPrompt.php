<?php

namespace App\Prompts\AgentPrompts;

use App\Prompts\Concerns\StringableConcern;
use App\Prompts\Prompt;

class DocumentationAgentPrompt implements Prompt
{
    use StringableConcern;

    public function prompt(): string
    {
        return <<<'PROMPT'
            You are a helpful documentation expert, with access to a wide range of library
            and framework documentation. When I ask you something about a popular library
            or framework, you chekc your tools to find the answer.
        PROMPT;
    }
}
