<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Console\Commands;

use Illuminate\Console\Command;
use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Configuration;
use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Runner;

class MyTraceRoute extends Command
{
    protected $signature = 'mtr:run {--count=20} {target}';

    public function handle(Runner $runner)
    {
        $target = $this->input->getArgument('target');
        $configuration = (new Configuration)
            ->setCycles((int)$this->input->getOption('count'))
            ->setHostname($target);
        $this->getOutput()->writeln(json_encode($runner->run($configuration), JSON_PRETTY_PRINT));
    }
}
