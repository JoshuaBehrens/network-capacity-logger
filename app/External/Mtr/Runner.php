<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr;

use Symfony\Component\Process\Process;

class Runner
{
    /**
     * @var ReportHydrator
     */
    private $hydrator;

    /**
     * @var string
     */
    private $executable;

    public function __construct(ReportHydrator $hydrator, string $executable)
    {
        $this->hydrator = $hydrator;
        $this->executable = $executable;
    }

    public function run(Configuration $configuration)
    {
        $process = new Process([
            $configuration->getExecutable() ?? $this->executable,
            '--json',
            '--show-ips',
            '-4',
            '--report-cycles',
            $configuration->getCycles(),
            $configuration->getHostname()
        ]);
        $process->enableOutput();
        $process->run();
        return $this->hydrator->hydrateResponse(json_decode($process->getOutput(), true));
    }
}
