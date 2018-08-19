<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Console\Commands;

use Illuminate\Console\Command;
use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Configuration;
use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Database\Hub;
use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Database\Request;
use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Runner;

class LogTraceRoute extends Command
{
    protected $signature = 'mtr:log {--count=100} {target}';

    public function handle(Runner $runner)
    {
        $target = $this->input->getArgument('target');
        $configuration = (new Configuration)
            ->setCycles((int)$this->input->getOption('count'))
            ->setHostname($target);
        $request = $runner->run($configuration);

        /** @var Request $requestModel */
        $requestModel = Request::create([
            'source' => $request->getConfiguration()->getSource(),
            'destination' => $request->getConfiguration()->getDestination(),
        ]);

        foreach ($request->getHubs() as $hub) {
            Hub::create([
                'request_id' => $requestModel->id,
                'host' => $hub->getHost(),
                'ip' => $hub->getIp(),
                'order' => $hub->getId(),
                'sent_packages' => $hub->getSentPackages(),
                'package_loss' => $hub->getPackageLoss(),
                'last_latency' => $hub->getLastLatency(),
                'average_latency' => $hub->getAverageLatency(),
                'minimum_latency' => $hub->getMinimumLatency(),
                'maximum_latency' => $hub->getMaximumLatency(),
                'standard_deviation_latency' => $hub->getStandardDeviationLatency(),
            ]);
        }
    }
}
