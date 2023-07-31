<?php

namespace Terpise\Solid\Commands;

use Illuminate\Console\Command;

class SolidCommand extends Command
{
    public $signature = 'terpise:solid';

    public $description = 'Test command';

    public function handle(): int
    {
        $text = config('solid.text');
        $this->comment($text);

        return self::SUCCESS;
    }
}
