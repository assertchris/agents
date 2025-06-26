<?php

namespace App\Prompts\ToolPrompts;

use App\Prompts\Concerns\StringableConcern;
use App\Prompts\Prompt;

class JiraAgentToolPrompt implements Prompt
{
    use StringableConcern;

    public function prompt(): string
    {
        return <<<'PROMPT'
            Performs actions in JIRA. We use JIRA for project management, so all project info, issues,
            bugs etc. are stored there. You can pass a textual query to this tool and it should help you
            find info or perform simple JIRA tasks.
        PROMPT;
    }
}
