<?php

namespace Egately\NovaManassaSdk\Commands;

use Illuminate\Console\Command;

class NovaManassaSdkCommand extends Command
{
    public $signature = 'nova-manassa-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
