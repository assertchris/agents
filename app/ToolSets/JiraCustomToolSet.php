<?php

namespace App\ToolSets;

use App\ToolSets\Concerns\IteratorAggregateConcern;
use Illuminate\Support\Collection;
use JiraRestApi\Configuration\ArrayConfiguration;
use JiraRestApi\Issue\IssueService;
use JiraRestApi\Issue\Transition;
use JiraRestApi\JiraException;
use Prism\Prism\Facades\Tool;
use Throwable;

class JiraCustomToolSet implements ToolSet
{
    use IteratorAggregateConcern;

    public function tools(): Collection
    {
        return collect([
            Tool::as('jira_custom_transition_tool')
                ->for('Transitions a ticket from one state to another')
                ->withStringParameter('issueKey', 'The key for the issue that must be transitioned')
                ->withStringParameter('transitionName', 'The transition name the issue is being transitioned to')
                ->using($this->transition(...)),
        ]);
    }

    public function transition(string $issueKey, string $transitionName, string $comment = 'Agent performing requested transition'): string
    {
        try {
            $transition = new Transition;
            $transition->setTransitionName($transitionName);
            $transition->setCommentBody($comment);

            $this->service()->transition($issueKey, $transition);

            return 'done.';
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }

    /**
     * @throws JiraException
     */
    private function service(): IssueService
    {
        return new IssueService(new ArrayConfiguration(config('jira')));
    }
}
