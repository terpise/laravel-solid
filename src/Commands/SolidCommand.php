<?php

namespace Terpise\Solid\Commands;

use Illuminate\Console\Command;

class SolidCommand extends Command
{
    public $signature = 'laravel-solid';

    public $description = 'My command';

    public function handle(): int
    {
        $text = config('solid.command');
        $this->comment($text);

        return self::SUCCESS;
    }
}
