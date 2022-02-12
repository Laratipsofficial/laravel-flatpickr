<?php

namespace Asdh\LaravelFlatpickr\Commands;

use Illuminate\Console\Command;

class LaravelFlatpickrCommand extends Command
{
    public $signature = 'laravel-flatpickr';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
