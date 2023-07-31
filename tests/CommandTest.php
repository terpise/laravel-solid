<?php

use function Pest\Laravel\artisan;
use Symfony\Component\Console\Command\Command as CommandAlias;

it('command config', function () {
    artisan(\Terpise\Solid\Commands\SolidCommand::class)
        ->expectsOutput(config('solid.text'))
        ->assertExitCode(CommandAlias::SUCCESS);
});

it('command set config', function () {
    config()->set('solid.text', 'Set text');
    artisan(\Terpise\Solid\Commands\SolidCommand::class)
        ->expectsOutput('Set text')
        ->assertExitCode(CommandAlias::SUCCESS);
});
