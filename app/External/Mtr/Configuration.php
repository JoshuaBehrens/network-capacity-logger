<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr;

class Configuration
{
    /** @var string|null */
    private $executable;

    /** @var string */
    private $hostname = '';

    /**
     * @var int
     */
    private $cycles = 1;

    public function getExecutable(): ?string
    {
        return $this->executable;
    }

    public function setExecutable(string $executable): Configuration
    {
        $this->executable = $executable;
        return $this;
    }

    public function getHostname(): string
    {
        return $this->hostname;
    }

    public function setHostname(string $hostname): Configuration
    {
        $this->hostname = $hostname;
        return $this;
    }

    public function getCycles(): int
    {
        return $this->cycles;
    }

    public function setCycles(int $cycles): Configuration
    {
        $this->cycles = $cycles;
        return $this;
    }
}
