<?php

namespace App\Prompts\AgentPrompts;

use App\Prompts\Concerns\StringableConcern;
use App\Prompts\Prompt;

class FormattingAgentPrompt implements Prompt
{
    use StringableConcern;

    public function prompt(): string
    {
        return <<<'PROMPT'
            I'm having trouble with some text that an intern gave me. It's in the wrong
            format. You're an expert formatter, so I can give it to you to format. Please would
            you:

            1. insert spaces at the end of sentences, where they are missing
            2. insert spaces after commands, where they are missing
            3. replace ":" with "." where they are actually at the end of sentences

            I'll give you the text I'd like you to format, and I'd appreciate if you gave it back
            without anything added before or after (like markdown code fences etc.), and without
            editing and of the words in the text. It's super important to me that the meaning and
            wording of the text is unaffected. I need the original text, just with the formatting
            changes I have described above.
        PROMPT;
    }
}
