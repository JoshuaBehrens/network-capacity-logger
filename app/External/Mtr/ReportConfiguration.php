<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr;

use JsonSerializable;

class ReportConfiguration implements JsonSerializable
{
    /**
     * @var ?string
     */
    private $source;

    /**
     * @var ?string
     */
    private $destination;

    /**
     * @var int
     */
    private $typeOfServiceId = 0;

    /**
     * @var int
     */
    private $packageSize = 0;

    /**
     * @var int
     */
    private $bitPattern = 0;

    /**
     * @var int
     */
    private $testValue = 0;

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): ReportConfiguration
    {
        $this->source = $source;
        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): ReportConfiguration
    {
        $this->destination = $destination;
        return $this;
    }

    public function getTypeOfServiceId(): int
    {
        return $this->typeOfServiceId;
    }

    public function setTypeOfServiceId(int $typeOfServiceId): ReportConfiguration
    {
        $this->typeOfServiceId = $typeOfServiceId;
        return $this;
    }

    public function getPackageSize(): int
    {
        return $this->packageSize;
    }

    public function setPackageSize(int $packageSize): ReportConfiguration
    {
        $this->packageSize = $packageSize;
        return $this;
    }

    public function getBitPattern(): int
    {
        return $this->bitPattern;
    }

    public function setBitPattern(int $bitPattern): ReportConfiguration
    {
        $this->bitPattern = $bitPattern;
        return $this;
    }

    public function getTestValue(): int
    {
        return $this->testValue;
    }

    public function setTestValue(int $testValue): ReportConfiguration
    {
        $this->testValue = $testValue;
        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
