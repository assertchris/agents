<?php

namespace App\Prompts\Concerns;

trait StringableConcern
{
    public function __toString(): string
    {
        return $this->prompt();
    }
}
