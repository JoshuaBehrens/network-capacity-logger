<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Report;

use JsonSerializable;

class Report implements JsonSerializable
{
    /** @var Configuration|null */
    private $configuration;

    /** @var Hub[] */
    private $hubs = [];

    public function getConfiguration(): ?Configuration
    {
        return $this->configuration;
    }

    public function setConfiguration(Configuration $configuration): Report
    {
        $this->configuration = $configuration;
        return $this;
    }

    /**
     * @return Hub[]
     */
    public function getHubs(): array
    {
        return $this->hubs;
    }

    /**
     * @param Hub[] $hubs
     * @return Report
     */
    public function setHubs(array $hubs): Report
    {
        $this->hubs = $hubs;
        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
