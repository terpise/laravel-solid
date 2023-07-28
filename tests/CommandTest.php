<?php

use Symfony\Component\Console\Command\Command as CommandAlias;
use function Pest\Laravel\artisan;

it('command config', function () {
    artisan(\Terpise\Solid\Commands\SolidCommand::class)
        ->expectsOutput(config('solid.command'))
        ->assertExitCode(CommandAlias::SUCCESS);
});

it('command set config', function () {
    config()->set('solid.command', 'Title laravel-solid-change');
    artisan(\Terpise\Solid\Commands\SolidCommand::class)
        ->expectsOutput(config('solid.command'))
        ->assertExitCode(CommandAlias::SUCCESS);
});

