<?php

namespace App\Console\Commands;

use App\Console\Commands\Concerns\FindsAgentsConcern;
use App\Enums\AgentResponseTypeEnum;
use Illuminate\Console\Command;

use function Laravel\Prompts\select;
use function Laravel\Prompts\table;
use function Laravel\Prompts\textarea;

class UseAgent extends Command
{
    use FindsAgentsConcern;

    /**
     * @var string
     */
    protected $signature = 'app:use-agent';

    /**
     * @var string
     */
    protected $description = 'Uses an agent';

    public function handle(): void
    {
        $class = select(
            label: 'What agent do you want to use?',
            options: $this->findAgents(),
        );

        $history = [];

        while (true) {
            $message = textarea(
                label: 'What would you like to say?',
            );

            // $calls = [];

            //            $answer = '';
            //
            //            foreach (app($class)->respond($message, $history, as: AgentResponseTypeEnum::Stream) as $chunk) {
            //                if (! str($answer)->trim()->endsWith(trim($chunk->text))) {
            //                    $answer .= $chunk->text;
            //                    echo $chunk->text;
            //                    flush();
            //                }
            //
            //                // if (isset($chunk->toolResults)) {
            //                //     foreach ($chunk->toolResults as $result) {
            //                //         $calls[] = $result;
            //                //     }
            //                // }
            //
            //                if ($chunk->finishReason) {
            //                    break;
            //                }
            //            }

            $response = app($class)->respond($message, $history, as: AgentResponseTypeEnum::Text);

            $this->info($response->text);

            $history[] = ['user', $message];
            $history[] = ['agent', $response->text];

            echo "\n\n";

            // table(
            //     headers: ['Tool', 'Result'],
            //     rows: collect($calls)->map(fn($call) => [
            //         'name' => $call->toolName,
            //         'result' => $call->result,
            //     ])
            // );
        }
    }
}
