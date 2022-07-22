<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

/**
 * Class MakeApiRequest.
 *
 * @author  Joker20 <manh.kiddihub@gmail.com>
 */
class MakeAPIRequest extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:apirequest {name : Create a request for api class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new a request for api class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'APIRequest';

    /**
     * @return string
     */
    protected function getStub()
    {
        return app_path('Console/Stubs/APIRequest.php');
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

        $this->files->put($path, $this->sortImports($this->buildServiceClass($name)));

        $this->info($this->type . ' created successfully.');
    }

    /**
     * Build the class with the given name.
     *
     * @param string $name
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildServiceClass(string $name): string
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    /**
     * @param $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Http\Requests';
    }
}
