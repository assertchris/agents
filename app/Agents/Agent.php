<?php

namespace App\Agents;

use App\Prompts\Prompt;
use Prism\Prism\Enums\Provider;

interface Agent
{
    public function provider(): Provider;

    public function model(): string;

    public function prompt(): Prompt;

    public function tools(): array;

    public function steps(): int;
}
