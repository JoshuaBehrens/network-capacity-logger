<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Report;

use JsonSerializable;

class Hub implements JsonSerializable
{
    /** @var int */
    private $id = 0;

    /** @var string */
    private $host = '';

    /** @var string */
    private $ip = '';

    /** @var float */
    private $packageLoss = .0;

    /** @var int */
    private $sentPackages = 0;

    /** @var float */
    private $lastLatency = .0;

    /** @var float */
    private $averageLatency = .0;

    /** @var float */
    private $minimumLatency = .0;

    /** @var float */
    private $maximumLatency = .0;

    /** @var float */
    private $standardDeviationLatency = .0;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Hub
    {
        $this->id = $id;
        return $this;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setHost(string $host): Hub
    {
        $this->host = $host;
        return $this;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip): Hub
    {
        $this->ip = $ip;
        return $this;
    }

    public function getPackageLoss(): float
    {
        return $this->packageLoss;
    }

    public function setPackageLoss(float $packageLoss): Hub
    {
        $this->packageLoss = $packageLoss;
        return $this;
    }

    public function getSentPackages(): int
    {
        return $this->sentPackages;
    }

    public function setSentPackages(int $sentPackages): Hub
    {
        $this->sentPackages = $sentPackages;
        return $this;
    }

    public function getLastLatency(): float
    {
        return $this->lastLatency;
    }

    public function setLastLatency(float $lastLatency): Hub
    {
        $this->lastLatency = $lastLatency;
        return $this;
    }

    public function getAverageLatency(): float
    {
        return $this->averageLatency;
    }

    public function setAverageLatency(float $averageLatency): Hub
    {
        $this->averageLatency = $averageLatency;
        return $this;
    }

    public function getMinimumLatency(): float
    {
        return $this->minimumLatency;
    }

    public function setMinimumLatency(float $minimumLatency): Hub
    {
        $this->minimumLatency = $minimumLatency;
        return $this;
    }

    public function getMaximumLatency(): float
    {
        return $this->maximumLatency;
    }

    public function setMaximumLatency(float $maximumLatency): Hub
    {
        $this->maximumLatency = $maximumLatency;
        return $this;
    }

    public function getStandardDeviationLatency(): float
    {
        return $this->standardDeviationLatency;
    }

    public function setStandardDeviationLatency(float $standardDeviationLatency): Hub
    {
        $this->standardDeviationLatency = $standardDeviationLatency;
        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
