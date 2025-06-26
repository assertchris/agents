<?php

declare(strict_types=1);

use Prism\Relay\Enums\Transport;

return [
    /*
    |--------------------------------------------------------------------------
    | MCP Server Configurations
    |--------------------------------------------------------------------------
    |
    | Define your MCP server configurations here. Each server should have a
    | name as the key, and a configuration array with the appropriate settings.
    |
    */
    'servers' => [
        'puppeteer' => [
            'transport' => Transport::Stdio,
            'command' => [
                'npx',
                '-y',
                '@modelcontextprotocol/server-puppeteer',
            ],
            'timeout' => env('RELAY_PUPPETEER_TIMEOUT', 60),
            'env' => [],
        ],
        'jira' => [
            'transport' => Transport::Stdio,
            'command' => [
                'npx',
                '-y',
                '@timbreeding/jira-mcp-server',
                '--jira-base-url='.env('RELAY_JIRA_BASE_URL'),
                '--jira-username='.env('RELAY_JIRA_USERNAME'),
                '--jira-api-token='.env('RELAY_JIRA_API_TOKEN'),
            ],
            'timeout' => env('RELAY_JIRA_TIMEOUT', 60),
            'env' => [],
        ],
        'context7' => [
            'transport' => Transport::Stdio,
            'command' => [
                'npx',
                '-y',
                '@upstash/context7-mcp',
            ],
            'timeout' => env('RELAY_CONTEXT7_TIMEOUT', 60),
            'env' => [],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Tool Definition Cache Duration
    |--------------------------------------------------------------------------
    |
    | This value determines how long (in minutes) the tool definitions fetched
    | from MCP servers will be cached. Set to 0 to disable caching entirely.
    |
    */
    'cache_duration' => env('RELAY_TOOLS_CACHE_DURATION', 60),
];
