<?php

namespace App\Prompts\ToolPrompts;

use App\Prompts\Concerns\StringableConcern;
use App\Prompts\Prompt;

class FormattingAgentToolPrompt implements Prompt
{
    use StringableConcern;

    public function prompt(): string
    {
        return <<<'PROMPT'
            Takes in some content (typically the answer to a question) and formats it
            according to preferences the tool already has. Just pass the content and
            you'll get back a neatly formatted answer you can pass along to the user.
        PROMPT;
    }
}
