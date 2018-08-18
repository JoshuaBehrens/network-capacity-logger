<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr;

use JsonSerializable;

class ReportHub implements JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var float
     */
    private $packageLoss;

    /**
     * @var int
     */
    private $sentPackages;

    /**
     * @var float
     */
    private $lastLatency;

    /**
     * @var float
     */
    private $averageLatency;

    /**
     * @var float
     */
    private $minimumLatency;

    /**
     * @var float
     */
    private $maximumLatency;

    /**
     * @var float
     */
    private $standardDeviationLatency;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ReportHub
     */
    public function setId(int $id): ReportHub
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return ReportHub
     */
    public function setHost(string $host): ReportHub
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     * @return ReportHub
     */
    public function setIp(string $ip): ReportHub
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return float
     */
    public function getPackageLoss(): float
    {
        return $this->packageLoss;
    }

    /**
     * @param float $packageLoss
     * @return ReportHub
     */
    public function setPackageLoss(float $packageLoss): ReportHub
    {
        $this->packageLoss = $packageLoss;
        return $this;
    }

    /**
     * @return int
     */
    public function getSentPackages(): int
    {
        return $this->sentPackages;
    }

    /**
     * @param int $sentPackages
     * @return ReportHub
     */
    public function setSentPackages(int $sentPackages): ReportHub
    {
        $this->sentPackages = $sentPackages;
        return $this;
    }

    /**
     * @return float
     */
    public function getLastLatency(): float
    {
        return $this->lastLatency;
    }

    /**
     * @param float $lastLatency
     * @return ReportHub
     */
    public function setLastLatency(float $lastLatency): ReportHub
    {
        $this->lastLatency = $lastLatency;
        return $this;
    }

    /**
     * @return float
     */
    public function getAverageLatency(): float
    {
        return $this->averageLatency;
    }

    /**
     * @param float $averageLatency
     * @return ReportHub
     */
    public function setAverageLatency(float $averageLatency): ReportHub
    {
        $this->averageLatency = $averageLatency;
        return $this;
    }

    /**
     * @return float
     */
    public function getMinimumLatency(): float
    {
        return $this->minimumLatency;
    }

    /**
     * @param float $minimumLatency
     * @return ReportHub
     */
    public function setMinimumLatency(float $minimumLatency): ReportHub
    {
        $this->minimumLatency = $minimumLatency;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaximumLatency(): float
    {
        return $this->maximumLatency;
    }

    /**
     * @param float $maximumLatency
     * @return ReportHub
     */
    public function setMaximumLatency(float $maximumLatency): ReportHub
    {
        $this->maximumLatency = $maximumLatency;
        return $this;
    }

    /**
     * @return float
     */
    public function getStandardDeviationLatency(): float
    {
        return $this->standardDeviationLatency;
    }

    /**
     * @param float $standardDeviationLatency
     * @return ReportHub
     */
    public function setStandardDeviationLatency(float $standardDeviationLatency): ReportHub
    {
        $this->standardDeviationLatency = $standardDeviationLatency;
        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
