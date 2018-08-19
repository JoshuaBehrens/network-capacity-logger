<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Report;

use JsonSerializable;

class Client implements JsonSerializable
{
    /** @var float */
    private $rating = .0;

    /** @var bool */
    private $loggedIn = false;

    /** @var float */
    private $ispRating = .0;

    /** @var float */
    private $ispDownloadAverage = .0;

    /** @var float */
    private $ispUploadAverage = .0;

    /** @var string */
    private $ip = '';

    /** @var string */
    private $isp = '';

    /** @var float */
    private $longitude = .0;

    /** @var float */
    private $latitude = .0;

    /** @var string */
    private $countryCode = '';

    public function getRating(): float
    {
        return $this->rating;
    }

    public function setRating(float $rating): Client
    {
        $this->rating = $rating;
        return $this;
    }

    public function isLoggedIn(): bool
    {
        return $this->loggedIn;
    }

    public function setLoggedIn(bool $loggedIn): Client
    {
        $this->loggedIn = $loggedIn;
        return $this;
    }

    public function getIspRating(): float
    {
        return $this->ispRating;
    }

    public function setIspRating(float $ispRating): Client
    {
        $this->ispRating = $ispRating;
        return $this;
    }

    public function getIspDownloadAverage(): float
    {
        return $this->ispDownloadAverage;
    }

    public function setIspDownloadAverage(float $ispDownloadAverage): Client
    {
        $this->ispDownloadAverage = $ispDownloadAverage;
        return $this;
    }

    public function getIspUploadAverage(): float
    {
        return $this->ispUploadAverage;
    }

    public function setIspUploadAverage(float $ispUploadAverage): Client
    {
        $this->ispUploadAverage = $ispUploadAverage;
        return $this;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip): Client
    {
        $this->ip = $ip;
        return $this;
    }

    public function getIsp(): string
    {
        return $this->isp;
    }

    public function setIsp(string $isp): Client
    {
        $this->isp = $isp;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): Client
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): Client
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): Client
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
