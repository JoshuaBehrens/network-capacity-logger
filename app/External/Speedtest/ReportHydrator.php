<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Speedtest;

use Illuminate\Support\Arr;
use JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Report\Client;
use JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Report\Response;
use JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Report\Server;

class ReportHydrator
{
    public function hydrateResponse(array $response): Response
    {
        return (new Response)
            ->setClient($this->hydrateByCallback($response, 'client', [], [$this, 'hydrateClient']))
            ->setServer($this->hydrateByCallback($response, 'server', [], [$this, 'hydrateServer']))
            ->setBytesSent($this->hydrateInt($response, 'bytes_sent', 0))
            ->setBytesReceived($this->hydrateInt($response, 'bytes_received', 0))
            ->setUploadBps($this->hydrateFloat($response, 'upload', 0))
            ->setDownloadBps($this->hydrateFloat($response, 'download', 0))
            ->setPing($this->hydrateFloat($response, 'ping', .0))
        ;
    }

    public function hydrateClient(array $clientData): Client
    {
        return (new Client)
            ->setIp($this->hydrateString($clientData, 'ip', ''))
            ->setCountryCode($this->hydrateString($clientData, 'country', ''))
            ->setIsp($this->hydrateString($clientData, 'isp', ''))
            ->setIspDownloadAverage($this->hydrateFloat($clientData, 'ispdlavg', .0))
            ->setIspUploadAverage($this->hydrateFloat($clientData, 'ispulavg', .0))
            ->setIspRating($this->hydrateFloat($clientData, 'isprating', .0))
            ->setLatitude($this->hydrateFloat($clientData, 'lat', .0))
            ->setLongitude($this->hydrateFloat($clientData, 'lon', .0))
            ->setRating($this->hydrateFloat($clientData, 'rating'))
            ->setLoggedIn($this->hydrateBool($clientData, 'loggedin', false))
        ;
    }

    public function hydrateServer(array $serverData): Server
    {
        return (new Server)
            ->setId($this->hydrateInt($serverData, 'id', 0))
            ->setName($this->hydrateString($serverData, 'name', ''))
            ->setUrl($this->hydrateString($serverData, 'url', ''))
            ->setUrl2($this->hydrateString($serverData, 'url2', ''))
            ->setHost($this->hydrateString($serverData, 'host', ''))
            ->setCountry($this->hydrateString($serverData, 'country', ''))
            ->setCountryCode($this->hydrateString($serverData, 'cc', ''))
            ->setSponsor($this->hydrateString($serverData, 'sponsor', ''))
            ->setLatency($this->hydrateFloat($serverData, 'latency', .0))
            ->setLatitude($this->hydrateFloat($serverData, 'lat', .0))
            ->setLongitude($this->hydrateFloat($serverData, 'lon', .0))
            ->setD($this->hydrateFloat($serverData, 'd', .0))
        ;
    }

    protected function hydrateString(array $data, string $key, string $default = ''): string
    {
        if (Arr::has($data, $key)) {
            return strval(Arr::get($data, $key));
        }

        return $default;
    }

    protected function hydrateInt(array $data, string $key, int $default = 0): int
    {
        if (Arr::has($data, $key)) {
            return intval(Arr::get($data, $key));
        }

        return $default;
    }

    protected function hydrateFloat(array $data, string $key, float $default = .0): float
    {
        if (Arr::has($data, $key)) {
            return floatval(Arr::get($data, $key));
        }

        return $default;
    }

    protected function hydrateBool(array $data, string $key, bool $default = false): bool
    {
        if (Arr::has($data, $key)) {
            return (bool) intval(Arr::get($data, $key));
        }

        return $default;
    }

    protected function hydrateByCallback(array $data, string $key, $default, callable $generator)
    {
        if (Arr::has($data, $key)) {
            return $generator(Arr::get($data, $key));
        }

        return $generator($default);
    }
}
