<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Report;

use JsonSerializable;

class Server implements JsonSerializable
{
    /** @var float */
    private $latency = .0;

    /** @var string */
    private $name = '';

    /** @var string */
    private $url = '';

    /** @var string */
    private $url2 = '';

    /** @var string */
    private $sponsor = '';

    /** @var string */
    private $country = '';

    /** @var string */
    private $countryCode = '';

    /** @var float */
    private $longitude = .0;

    /** @var float */
    private $latitude = .0;

    /** @var string */
    private $host = '';

    /** @var int */
    private $id = 0;

    /** @var float */
    private $d = .0;

    public function getLatency(): float
    {
        return $this->latency;
    }

    public function setLatency(float $latency): Server
    {
        $this->latency = $latency;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Server
    {
        $this->name = $name;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Server
    {
        $this->url = $url;
        return $this;
    }

    public function getUrl2(): string
    {
        return $this->url2;
    }

    public function setUrl2(string $url2): Server
    {
        $this->url2 = $url2;
        return $this;
    }

    public function getSponsor(): string
    {
        return $this->sponsor;
    }

    public function setSponsor(string $sponsor): Server
    {
        $this->sponsor = $sponsor;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): Server
    {
        $this->country = $country;
        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): Server
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): Server
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): Server
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setHost(string $host): Server
    {
        $this->host = $host;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Server
    {
        $this->id = $id;
        return $this;
    }

    public function getD(): float
    {
        return $this->d;
    }

    public function setD(float $d): Server
    {
        $this->d = $d;
        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
