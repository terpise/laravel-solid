<?php

it('can test', function () {
    expect(true)->toBeTrue();

    \Pest\Laravel\artisan(\Terpise\Solid\Commands\SolidCommand::class)->assertExitCode(\Illuminate\Console\Command::SUCCESS);
});
