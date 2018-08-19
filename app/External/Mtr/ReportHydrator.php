<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr;

use Illuminate\Support\Arr;
use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Report\Configuration;
use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Report\Hub;
use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Report\Report;
use JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Report\Response;

class ReportHydrator
{
    public function hydrateResponse(array $response): Response
    {
        return (new Response)
            ->setReport($this->hydrateByCallback($response, 'report', [], [$this, 'hydrateReport']))
        ;
    }

    public function hydrateReport(array $reportData): Report
    {
        $result = new Report;
        $result->setConfiguration($this->hydrateByCallback($reportData, 'mtr', [], [$this, 'hydrateReportConfiguration']));
        $result->setHubs($this->hydrateByCallback($reportData, 'hubs', [], function (array $data): array {
            return array_map([$this, 'hydrateReportHub'], $data);
        }));
        return $result;
    }

    public function hydrateReportConfiguration(array $reportConfigurationData): Configuration
    {
        return (new Configuration)
            ->setBitPattern($this->hydrateInt($reportConfigurationData, 'bitpattern'))
            ->setDestination($this->hydrateString($reportConfigurationData, 'dst'))
            ->setPackageSize($this->hydrateInt($reportConfigurationData, 'psize'))
            ->setSource($this->hydrateString($reportConfigurationData, 'src'))
            ->setTestValue($this->hydrateInt($reportConfigurationData, 'test'))
            ->setTypeOfServiceId($this->hydrateInt($reportConfigurationData, 'tos'))
        ;
    }

    public function hydrateReportHub(array $reportHubData): Hub
    {
        $host = $this->hydrateString($reportHubData, 'host');
        preg_match('/(?:(.*)\s+?\((\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})\)|(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}))/', $host, $matches);
        array_shift($matches);

        return (new Hub)
            ->setAverageLatency($this->hydrateFloat($reportHubData, 'Avg'))
            ->setId($this->hydrateInt($reportHubData, 'count'))
            ->setHost(Arr::first($matches, null, ''))
            ->setIp(Arr::last($matches, null, ''))
            ->setLastLatency($this->hydrateFloat($reportHubData, 'Last'))
            ->setMaximumLatency($this->hydrateFloat($reportHubData, 'Wrst'))
            ->setMinimumLatency($this->hydrateFloat($reportHubData, 'Best'))
            ->setPackageLoss($this->hydrateFloat($reportHubData, 'Loss%'))
            ->setStandardDeviationLatency($this->hydrateFloat($reportHubData, 'StDev'))
            ->setSentPackages($this->hydrateInt($reportHubData, 'Snt'))
        ;
    }

    protected function hydrateString(array $data, string $key, string $default = ''): string
    {
        if (Arr::has($data, $key)) {
            return strval(Arr::get($data, $key));
        }

        return $default;
    }

    protected function hydrateInt(array $data, string $key, int $default = 0): int
    {
        if (Arr::has($data, $key)) {
            return intval(Arr::get($data, $key));
        }

        return $default;
    }

    protected function hydrateFloat(array $data, string $key, float $default = .0): float
    {
        if (Arr::has($data, $key)) {
            return floatval(Arr::get($data, $key));
        }

        return $default;
    }

    protected function hydrateByCallback(array $data, string $key, $default, callable $generator)
    {
        if (Arr::has($data, $key)) {
            return $generator(Arr::get($data, $key));
        }

        return $generator($default);
    }
}
