<?php

return [
    'jiraHost' => env('RELAY_JIRA_BASE_URL'),
    'useTokenBasedAuth' => true,
    'personalAccessToken' => env('RELAY_JIRA_API_TOKEN'),

    // custom log config
    'jiraLogEnabled' => false,
    'jiraLogFile' => storage_path('app/jira-client.log'),
    'jiraLogLevel' => 'INFO',

    // to enable session cookie authorization (with basic authorization only)
    'cookieAuthEnabled' => true,
    'cookieFile' => storage_path('jira-cookie.txt'),

    // if you are behind a proxy, add proxy settings
    // 'proxyServer' => 'your-proxy-server',
    // 'proxyPort' => 'proxy-port',
    // 'proxyUser' => 'proxy-username',
    // 'proxyPassword' => 'proxy-password',
];
