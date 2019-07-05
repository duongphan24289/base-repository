<?php

namespace BaseRepository\Console;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class RepositoryMakeCommand extends GeneratorCommand
{
    /**
     * The console command name
     *
     * @var string
     */
    protected $name = "make:repository";

    /**
     * The console command description
     *
     * @var string
     */
    protected $description = "Create a new repository class";

    /**
     * The type of class being generated
     *
     * @var string
     */
    protected $type = "Repository";

    public function handle()
    {
        if(parent::handle() === false && !$this->option('force')){
            return;
        }

        if($this->option('interface')){
            $this->createRepositoryInterface();
        }
    }

    protected function createRepositoryInterface()
    {
        $repositoryName = Str::studly(class_basename($this->argument('name')));

        $this->call('make:interface', [
            'name' => "{$repositoryName}Interface"
        ]);
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . "\Repositories";
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . "/stubs/repository.stub";
    }

    protected function getOptions()
    {
        return [
            ['force', 'f', InputOption::VALUE_NONE, 'Create the class even if the repository already exists.'],
            ['interface', 'i', InputOption::VALUE_NONE, 'Create a new interface for the repository.'],
        ];
    }
}