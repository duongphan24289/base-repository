<?php

namespace BaseRepository\Console;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class RepositoryInterfaceMakeCommand extends GeneratorCommand
{
    /**
     * The console command name
     *
     * @var string
     */
    protected $name = "make:interface";

    /**
     * The console command description
     *
     * @var string
     */
    protected $description = "Create a new Interface of Repository class.";

    /**
     * The type of class being generated
     *
     * @var string
     */
    protected $type = "RepositoryInterface";

    public function handle()
    {
        if(parent::handle() === false && !$this->option('force')){
            return;
        }
    }

    protected function getStub()
    {
        return __DIR__ . '/stubs/repositoryInterface.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . "\Repositories\Contracts";
    }

    protected function getOptions()
    {
        return [
            ['force', 'f', InputOption::VALUE_NONE, 'Create the class even if the repository already exists.'],
        ];
    }
}