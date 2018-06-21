<?php

namespace App\Console\Commands\Builder;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Filesystem\Filesystem;

class Resource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'builder:resource {class} {namespace} {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an entity, interface and repository for a class';

    /**
     * @var Filesystem
     */
    protected $fileSystem;

    /**
     * @var array
     */
    protected $paths = [];

    /**
     * Create a new command instance.
     *
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();

        $this->fileSystem = $filesystem;
        $this->paths = [
            'entity' => [
                'path' => app_path('Entities'),
                'stub' => resource_path('stubs/entity.stub'),
                'suffix' => '.php',
            ],
            'interface' => [
                'path' => app_path('Interfaces'),
                'stub' => resource_path('stubs/interface.stub'),
                'suffix' => 'Interface.php',
            ],
            'repository' => [
                'path' => app_path('Repositories/Eloquent'),
                'stub' => resource_path('stubs/repository.stub'),
                'suffix' => 'Repository.php',
            ],
        ];
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (App::environment() === 'production') {
            $this->error('This command can only be run in a development environment');

            return;
        } else {
            $class = str_singular(ucfirst(camel_case(class_basename($this->argument('class')))));
            $namespace = $this->argument('namespace');
            $table = strtolower($this->argument('table'));

            foreach ($this->paths as $key => $resource) {
                $resource_name = ucwords($key);
                $resource_file_path = $this->pathForResource($resource['path'], $resource['suffix'], $class, $namespace);
                $resource_path = $this->pathForResource($resource['path'], $resource['suffix'], $class, $namespace, false);

                if ($this->fileExists($resource_file_path)) {
                    $this->error($resource_name.' file already exists, please check your class and namespace');

                    return;
                } else {
                    $stub = $this->buildFromStub($resource['stub'], $class, $namespace, $table);

                    if (is_null($stub)) {
                        $this->error('Error building stub for '.$resource_name);

                        return;
                    }

                    if ($this->fileExists($resource_path) == false) {
                        $this->fileSystem->makeDirectory($resource_path);
                    }
                    $this->fileSystem->put($resource_file_path, $stub);
                }
            }

            $this->info('Entity, interface, and repository generated successfully');
        }
    }

    /**
     * @param $path
     * @param string $suffix
     * @param $class
     * @param $namespace
     * @param bool $with_file
     * @return string
     */
    private function pathForResource($path, $suffix, $class, $namespace, $with_file = true)
    {
        $namespace_as_path = str_replace('\\', '/', $namespace);

        if ($with_file) {
            return sprintf('%s/%s/%s%s', $path, $namespace_as_path, $class, $suffix);
        } else {
            return sprintf('%s/%s', $path, $namespace_as_path);
        }
    }

    /**
     * @param $path
     * @return bool
     */
    private function fileExists($path)
    {
        if ($this->fileSystem->exists($path)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $path
     * @param $class
     * @param $namespace
     * @param $table
     * @return mixed|null|string
     */
    private function buildFromStub($path, $class, $namespace, $table)
    {
        try {
            $stub = $this->fileSystem->get($path);
            $stub = str_replace('{{class}}', $class, $stub);
            $stub = str_replace('{{namespace}}', $namespace, $stub);
            $stub = str_replace('{{table}}', $table, $stub);

            return $stub;
        } catch (Exception $e) {
            return;
        }
    }
}
