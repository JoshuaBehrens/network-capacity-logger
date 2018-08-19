<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Speedtest;

use JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Exceptions\ExecutableException;
use JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Report\Response;
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

    /**
     * @var int
     */
    private $timeoutSeconds;

    public function __construct(ReportHydrator $hydrator, string $executable, int $timeoutSeconds)
    {
        $this->hydrator = $hydrator;
        $this->executable = $executable;
        $this->timeoutSeconds = $timeoutSeconds;
    }

    public function run(): Response
    {
        $process = new Process([
            $this->executable,
            '--json'
        ]);
        $process->enableOutput();
        $process->setTimeout($this->timeoutSeconds);
        $process->run();

        if ($process->getExitCode() != 0) {
            throw new ExecutableException($process->getErrorOutput(), $process->getExitCode());
        }

        return $this->hydrator->hydrateResponse(json_decode($process->getOutput(), true));
    }
}
