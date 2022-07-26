<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

/**
 * Class MakeService.
 *
 * @author  Joker20 <manh.kiddihub@gmail.com>
 */
class MakeService extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name : Create a service class} {--db}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class and contract';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    /**
     * @return string
     */
    protected function getStub()
    {
    }

    /**
     * @return string
     */
    protected function getServiceStub()
    {
        return app_path('Console/Stubs/Service.stub');
    }

    /**
     * @return string
     */
    protected function getDBServiceStub()
    {
        return app_path('Console/Stubs/DBService.stub');
    }

    /**
     * Execute the console command.
     *
     * @return bool|null
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @see \Illuminate\Console\GeneratorCommand
     *
     */
    public function handle()
    {
        if ($this->isReservedName($this->getNameInput())) {
            $this->error('The name "' . $this->getNameInput() . '" is reserved by PHP.');

            return false;
        }

        $name = $this->qualifyClass($this->getNameInput());

        $path = $this->getPath($name);

        if ((! $this->hasOption('force') ||
                ! $this->option('force')) &&
            $this->alreadyExists($this->getNameInput())) {
            $this->error($this->type . ' already exists!');

            return false;
        }

        $this->makeDirectory($path);
        $isDBService = $this->option('db');

        $this->files->put($path, $this->sortImports($this->buildServiceClass($name, $isDBService)));

        $this->info($this->type . ' created successfully.');
    }

    /**
     * Build the class with the given name.
     *
     * @param string $name
     * @param $isDBService
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildServiceClass(string $name, $isDBService): string
    {
        $stub = $this->files->get(
            $isDBService ? $this->getDBServiceStub() : $this->getServiceStub()
        );

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    /**
     * @param $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Services';
    }
}
