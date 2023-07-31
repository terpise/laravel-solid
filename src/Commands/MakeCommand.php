<?php

namespace Terpise\Solid\Commands;

use Illuminate\Console\Command;

class MakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'solid:make {name} {--all} {--contract} {--model} {--request} {--resource} {--collection} {--repository} {--controller}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new SOLID class';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->option('all')) {
            $this->input->setOption('contract', true);
            $this->input->setOption('model', true);
            $this->input->setOption('request', true);
            $this->input->setOption('resource', true);
            $this->input->setOption('collection', true);
            $this->input->setOption('repository', true);
            $this->input->setOption('controller', true);
        }
        if ($this->option('contract')) {
            $this->createContract();
        }
        if ($this->option('model')) {
            $this->createModel();
        }
        if ($this->option('request')) {
            $this->createRequest();
        }
        if ($this->option('resource')) {
            $this->createResource();
        }
        if ($this->option('collection')) {
            $this->createCollection();
        }
        if ($this->option('repository')) {
            $this->createRepository();
        }
        if ($this->option('controller')) {
            $this->createController();
        }

        return 0;
    }

    public function createContract()
    {
        $this->call('solid:make-contract', [
            'name' => $this->argument('name').'Interface',
        ]);
    }

    public function createModel()
    {
        $this->call('make:model', [
            'name' => $this->argument('name'),
        ]);
    }

    public function createRequest()
    {
        $this->call('solid:make-request', [
            'name' => $this->argument('name').'StoreRequest',
        ]);
        $this->call('solid:make-request', [
            'name' => $this->argument('name').'UpdateRequest',
        ]);
    }

    public function createResource()
    {
        $this->call('solid:make-resource', [
            'name' => $this->argument('name').'Resource',
        ]);
    }

    public function createCollection()
    {
        $this->call('solid:make-collection', [
            'name' => $this->argument('name').'Collection',
        ]);
    }

    public function createRepository()
    {
        $this->call('solid:make-repository', [
            'name' => $this->argument('name').'Repository',
        ]);
    }

    public function createController()
    {
        $this->call('solid:make-controller', [
            'name' => $this->argument('name').'Controller',
        ]);
    }
}
