<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr;

use JsonSerializable;

class Report implements JsonSerializable
{
    /**
     * @var ?ReportConfiguration
     */
    private $configuration;

    /**
     * @var ReportHub[]
     */
    private $hubs = [];

    public function getConfiguration(): ?ReportConfiguration
    {
        return $this->configuration;
    }

    public function setConfiguration(ReportConfiguration $configuration): Report
    {
        $this->configuration = $configuration;
        return $this;
    }

    /**
     * @return ReportHub[]
     */
    public function getHubs(): array
    {
        return $this->hubs;
    }

    /**
     * @param ReportHub[] $hubs
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
