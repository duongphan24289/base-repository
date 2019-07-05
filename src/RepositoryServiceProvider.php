<?php

namespace BaseRepository;

use BaseRepository\Console\RepositoryInterfaceMakeCommand;
use BaseRepository\Console\RepositoryMakeCommand;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $commands = [
        RepositoryMakeCommand::class,
        RepositoryInterfaceMakeCommand::class,
    ];

    public function register()
    {
        $this->commands($this->commands);
    }
}