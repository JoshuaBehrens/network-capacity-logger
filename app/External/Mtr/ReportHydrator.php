<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr;

use Illuminate\Support\Arr;

class ReportHydrator
{
    public function hydrateResponse(array $response): Report
    {
        /** @var Report $result */
        $result = $this->hydrateByCallback($response, 'report', [], [$this, 'hydrateReport']);
        return $result;
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

    public function hydrateReportConfiguration(array $reportConfigurationData): ReportConfiguration
    {
        return (new ReportConfiguration)
            ->setBitPattern($this->hydrateInt($reportConfigurationData, 'bitpattern'))
            ->setDestination($this->hydrateString($reportConfigurationData, 'dst'))
            ->setPackageSize($this->hydrateInt($reportConfigurationData, 'psize'))
            ->setSource($this->hydrateString($reportConfigurationData, 'src'))
            ->setTestValue($this->hydrateInt($reportConfigurationData, 'test'))
            ->setTypeOfServiceId($this->hydrateInt($reportConfigurationData, 'tos'))
        ;
    }

    public function hydrateReportHub(array $reportHubData): ReportHub
    {
        $host = $this->hydrateString($reportHubData, 'host');
        preg_match('/(?:(.*)\s+?\((\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})\)|(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}))/', $host, $matches);
        array_shift($matches);

        return (new ReportHub)
            ->setAverageLatency($this->hydrateFloat($reportHubData, 'Avg'))
            ->setId($this->hydrateInt($reportHubData, 'count'))
            ->setHost(Arr::first($matches))
            ->setIp(Arr::last($matches))
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
        if (array_key_exists($key, $data)) {
            return strval($data[$key]);
        }

        return $default;
    }

    protected function hydrateInt(array $data, string $key, int $default = 0): int
    {
        if (array_key_exists($key, $data)) {
            return intval($data[$key]);
        }

        return $default;
    }

    protected function hydrateFloat(array $data, string $key, float $default = .0): float
    {
        if (array_key_exists($key, $data)) {
            return floatval($data[$key]);
        }

        return $default;
    }

    protected function hydrateByCallback(array $data, string $key, $default, callable $generator)
    {
        if (array_key_exists($key, $data)) {
            return $generator($data[$key]);
        }

        return $generator($default);
    }
}
