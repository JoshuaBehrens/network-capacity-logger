<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Report;

class Response implements \JsonSerializable
{
    /** @var Report|null */
    private $report;

    public function getReport(): ?Report
    {
        return $this->report;
    }

    public function setReport(Report $report): Response
    {
        $this->report = $report;
        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
