<?php

namespace App\Prompts\ToolPrompts;

use App\Prompts\Concerns\StringableConcern;
use App\Prompts\Prompt;

class DocumentationAgentToolPrompt implements Prompt
{
    use StringableConcern;

    public function prompt(): string
    {
        return <<<'PROMPT'
            Looks for information relating to popular libraries or frameworks. When I want to know
            how to do something with a library or framework, you can send a simple textual query to
            this tool. If the library/framework version isn't clear in the query, then you should
            provide it after checking with the user.
        PROMPT;
    }
}
