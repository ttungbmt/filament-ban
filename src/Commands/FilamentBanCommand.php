<?php

namespace FilamentPro\FilamentBan\Commands;

use Illuminate\Console\Command;

class FilamentBanCommand extends Command
{
    public $signature = 'filament-ban';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
