<?php

namespace App\Prompts;

use Stringable;

interface Prompt extends Stringable
{
    public function prompt(): string;
}
