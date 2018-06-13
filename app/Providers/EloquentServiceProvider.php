<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class EloquentServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected static $interfaceNamespace = 'App\Interfaces';

    /**
     * @var string
     */
    protected static $eloquentNamespace = 'App\Repositories\Eloquent';

    public function register()
    {
        $interfaces = $this->generateListForDirectory(
            __DIR__.'/../Interfaces',
            'Interface.php',
            ['AbstractInterface.php']
        );

        $repositories = $this->generateListForDirectory(
            __DIR__.'/../Repositories/Eloquent/',
            'Repository.php'
        );

        // Create bindings ONLY if we have a matching repository for our interface
        foreach ($interfaces as $interface) {
            $repositoryKey = array_search($interface, $repositories, true);

            if ($repositoryKey !== false) {
                $this->app->bind(
                    self::$interfaceNamespace.'\\'.$interface.'Interface',
                    self::$eloquentNamespace.'\\'.$repositories[$repositoryKey].'Repository'
                );
            }
        }
    }

    /**
     * @param $directory
     * @param string $file_suffix
     * @param array $ignored_files
     * @return array
     */
    private function generateListForDirectory($directory, $file_suffix = '.php', $ignored_files = [])
    {
        $discoveredFiles = [];
        $fileList = File::allFiles($directory);

        foreach ($fileList as $file) {
            $fileName = $file->getRelativePathname();

            if (! in_array($fileName, $ignored_files)) {
                $cleanedName = str_replace('/', '\\', $fileName);
                $cleanedName = str_replace($file_suffix, '', $cleanedName);

                array_push($discoveredFiles, $cleanedName);
            }
        }

        return $discoveredFiles;
    }
}
