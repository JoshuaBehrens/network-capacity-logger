<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Console\Commands;

use Illuminate\Console\Command;
use JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Database\Request;
use JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Runner;

class Log extends Command
{
    protected $signature = 'speedtest:log';

    public function handle(Runner $runner)
    {
        $request = $runner->run();
        Request::create([
            'client_ip' => $request->getClient()->getIp(),
            'client_isp' => $request->getClient()->getIsp(),
            'client_isp_rating' => $request->getClient()->getIspRating(),
            'client_longitude' => $request->getClient()->getLongitude(),
            'client_latitude' => $request->getClient()->getLatitude(),
            'bytes_sent' => $request->getBytesSent(),
            'upload_bps' => $request->getUploadBps(),
            'bytes_received' => $request->getBytesReceived(),
            'download_bps' => $request->getDownloadBps(),
            'ping' => $request->getPing(),
            'server_id' => $request->getServer()->getId(),
            'server_name' => $request->getServer()->getName(),
            'server_host' => $request->getServer()->getHost(),
            'server_sponsor' => $request->getServer()->getSponsor(),
            'server_longitude' => $request->getServer()->getLongitude(),
            'server_latitude' => $request->getServer()->getLatitude(),
        ]);
    }
}
