<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Speedtest\Database;

use DateTime;
use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Request
 * @property string $id
 * @property string $client_ip
 * @property string $client_isp
 * @property float $client_isp_rating
 * @property float $client_longitude
 * @property float $client_latitude
 * @property float $bytes_sent
 * @property float $upload_bps
 * @property float $bytes_received
 * @property float $download_bps
 * @property float $ping
 * @property int $server_id
 * @property string $server_name
 * @property string $server_host
 * @property string $server_sponsor
 * @property float $server_longitude
 * @property float $server_latitude
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Request extends Model
{
    use Uuids,
        HasTimestamps;

    protected $table = 'speedtest_requests';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'client_ip',
        'client_isp',
        'client_isp_rating',
        'client_longitude',
        'client_latitude',
        'bytes_sent',
        'upload_bps',
        'bytes_received',
        'download_bps',
        'ping',
        'server_id',
        'server_name',
        'server_host',
        'server_sponsor',
        'server_longitude',
        'server_latitude',
    ];
}
