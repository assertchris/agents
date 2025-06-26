<?php

namespace App\Enums;

enum AgentResponseTypeEnum: string
{
    case Text = 'text';
    case Stream = 'stream';
}
