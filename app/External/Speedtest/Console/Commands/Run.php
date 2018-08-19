<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Console\Commands;

use Illuminate\Console\Command;
use JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Runner;

class Run extends Command
{
    protected $signature = 'speedtest:run';

    public function handle(Runner $runner)
    {
        $this->getOutput()->writeln(json_encode($runner->run(), JSON_PRETTY_PRINT));
    }
}
