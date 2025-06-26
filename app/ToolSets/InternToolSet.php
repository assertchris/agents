<?php

namespace App\ToolSets;

use App\Agents\DocumentationAgent;
use App\Agents\FormattingAgent;
use App\Agents\JiraAgent;
use App\Agents\SearchAgent;
use App\Prompts\ToolPrompts\DocumentationAgentToolPrompt;
use App\Prompts\ToolPrompts\FormattingAgentToolPrompt;
use App\Prompts\ToolPrompts\JiraAgentToolPrompt;
use App\Prompts\ToolPrompts\SearchAgentToolPrompt;
use App\ToolSets\Concerns\AgentQueryConcern;
use App\ToolSets\Concerns\IteratorAggregateConcern;
use Illuminate\Support\Collection;
use Prism\Prism\Facades\Tool;

class InternToolSet implements ToolSet
{
    use AgentQueryConcern;
    use IteratorAggregateConcern;

    public function tools(): Collection
    {
        return collect([
            Tool::as('intern_jira_tool')
                ->for(resolve(JiraAgentToolPrompt::class))
                ->withStringParameter('query', 'A textual JIRA query')
                ->using($this->jira(...)),
            Tool::as('intern_documentation_tool')
                ->for(resolve(DocumentationAgentToolPrompt::class))
                ->withStringParameter('query', 'A textual documentation query')
                ->using($this->jira(...)),
            Tool::as('intern_search_tool')
                ->for(resolve(SearchAgentToolPrompt::class))
                ->withStringParameter('query', 'The query to search with')
                ->using($this->search(...)),
            // Tool::as('intern_formatting_tool')
            //     ->for(resolve(FormattingAgentToolPrompt::class))
            //     ->withStringParameter('answer', 'The answer you would like to format')
            //     ->using($this->formatting(...)),
        ]);
    }

    public function jira(string $query): string
    {
        return $this->agentQuery(JiraAgent::class, $query);
    }

    public function documentation(string $query): string
    {
        return $this->agentQuery(DocumentationAgent::class, $query);
    }

    public function search(string $query): string
    {
        return $this->agentQuery(SearchAgent::class, $query);
    }

    public function formatting(string $answer): string
    {
        return $this->agentQuery(FormattingAgent::class, $answer);
    }
}
