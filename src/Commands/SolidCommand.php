<?php

namespace Terpise\Solid\Commands;

use Illuminate\Console\Command;

class SolidCommand extends Command
{
    public $signature = 'laravel-solid';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
