<?php

namespace App\Console\Commands\Concerns;

use App\Agents\Agent;
use Illuminate\Support\Facades\File;

trait FindsAgentsConcern
{
    public function findAgents(string $interface = Agent::class, string $directory = 'app/Agents'): array
    {
        $implementations = [];

        $files = File::allFiles(base_path($directory));

        foreach ($files as $file) {
            $path = $file->getRealPath();

            $class = $this->classFromFile($path);

            if (! class_exists($class)) {
                continue;
            }

            if (in_array($interface, class_implements($class))) {
                $implementations[] = $class;
            }
        }

        return $implementations;
    }

    private function classFromFile(string $path): ?string
    {
        $contents = file_get_contents($path);

        if (preg_match('/^namespace\s+(.+?);/m', $contents, $namespaceMatch)) {
            $namespace = $namespaceMatch[1];
        } else {
            $namespace = null;
        }

        if (preg_match('/^class\s+(\w+)/m', $contents, $classMatch)) {
            $class = $classMatch[1];
        } else {
            return null;
        }

        if ($namespace) {
            return $namespace.'\\'.$class;
        }

        return $class;
    }
}
