<?php

namespace App\Agents\Concerns;

use App\Enums\AgentResponseTypeEnum;
use Generator;
use Prism\Prism\Prism;
use Prism\Prism\Text\Response;
use Prism\Prism\ValueObjects\Messages\UserMessage;

trait RespondsConcern
{
    public function respond(string $message, array $history = [], AgentResponseTypeEnum $as = AgentResponseTypeEnum::Text): Response|Generator
    {
        $prompt = [
            $this->prompt(),
        ];

        if (count($history) > 1) {
            $prompt[] = 'Here are the previous messages in the conversation:';
            $prompt[] = json_encode($history);
            $prompt[] = 'Use this data to inform your answers';
        }

        $prompt = implode("\n\n", $prompt);

        $handle = Prism::text()
            ->using($this->provider(), $this->model())
            ->withSystemPrompt($prompt)
            ->withMessages([
                new UserMessage($message),
            ])
            ->withTools($this->tools())
            ->withMaxSteps($this->steps());

        return match ($as) {
            AgentResponseTypeEnum::Text => $handle->asText(),
            AgentResponseTypeEnum::Stream => $handle->asStream(),
        };
    }
}
