<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Report;

use JsonSerializable;

class Response implements JsonSerializable
{
    /** @var Client|null */
    private $client;

    /** @var Server|null */
    private $server;

    /** @var int */
    private $bytesSent = 0;

    /** @var int */
    private $bytesReceived = 0;

    /** @var float */
    private $downloadBps = .0;

    /** @var float */
    private $uploadBps = .0;

    /** @var float */
    private $ping = .0;

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(Client $client): Response
    {
        $this->client = $client;
        return $this;
    }

    public function getServer(): ?Server
    {
        return $this->server;
    }

    public function setServer(Server $server): Response
    {
        $this->server = $server;
        return $this;
    }

    public function getBytesSent(): int
    {
        return $this->bytesSent;
    }

    public function setBytesSent(int $bytesSent): Response
    {
        $this->bytesSent = $bytesSent;
        return $this;
    }

    public function getBytesReceived(): int
    {
        return $this->bytesReceived;
    }

    public function setBytesReceived(int $bytesReceived): Response
    {
        $this->bytesReceived = $bytesReceived;
        return $this;
    }

    public function getDownloadBps(): float
    {
        return $this->downloadBps;
    }

    public function setDownloadBps(float $downloadBps): Response
    {
        $this->downloadBps = $downloadBps;
        return $this;
    }

    public function getUploadBps(): float
    {
        return $this->uploadBps;
    }

    public function setUploadBps(float $uploadBps): Response
    {
        $this->uploadBps = $uploadBps;
        return $this;
    }

    public function getPing(): float
    {
        return $this->ping;
    }

    public function setPing(float $ping): Response
    {
        $this->ping = $ping;
        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
