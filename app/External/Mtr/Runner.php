<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr;

use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Exceptions\ExecutableException;
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

    public function run(Configuration $configuration): Report
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
        $process->setTimeout($configuration->getCycles() * 5);
        $process->run();

        if ($process->getExitCode() != 0) {
            throw new ExecutableException($process->getErrorOutput(), $process->getExitCode());
        }

        return $this->hydrator->hydrateResponse(json_decode($process->getOutput(), true));
    }
}
