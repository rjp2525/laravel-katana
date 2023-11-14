<?php

namespace Reno\Katana\Commands;

use Illuminate\Console\Command;

class KatanaCommand extends Command
{
    public $signature = 'katana';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
