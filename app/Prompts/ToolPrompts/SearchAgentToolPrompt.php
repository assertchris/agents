<?php

namespace App\Prompts\ToolPrompts;

use App\Prompts\Concerns\StringableConcern;
use App\Prompts\Prompt;

class SearchAgentToolPrompt implements Prompt
{
    use StringableConcern;

    public function prompt(): string
    {
        return <<<'PROMPT'
            Searches for something in the Google search engine. Just pass in your query
            and you'll get back a list of results from Google.
        PROMPT;
    }
}
