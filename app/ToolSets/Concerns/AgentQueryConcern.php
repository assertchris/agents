<?php

namespace App\ToolSets\Concerns;

use Throwable;

trait AgentQueryConcern
{
    public function agentQuery(string $agent, string $query)
    {
        try {
            $response = app($agent)->respond($query);

            return $response->text;
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }
}
