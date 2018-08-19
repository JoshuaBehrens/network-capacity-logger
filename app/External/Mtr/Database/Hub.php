<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Database;

use DateTime;
use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Hub
 *
 * @property string $id
 * @property string $request_id
 * @property string $host
 * @property string $ip
 * @property int $order
 * @property int $sent_packages
 * @property float $package_loss
 * @property float|null $last_latency
 * @property float|null $average_latency
 * @property float|null $minimum_latency
 * @property float|null $maximum_latency
 * @property float|null $standard_deviation_latency
 * @property DateTime $created_at
 * @property DateTime $updated_at
 * @property Request $request
 */
class Hub extends Model
{
    use Uuids,
        HasTimestamps;

    protected $table = 'mtr_hubs';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'request_id',
        'host',
        'ip',
        'order',
        'sent_packages',
        'package_loss',
        'last_latency',
        'average_latency',
        'minimum_latency',
        'maximum_latency',
        'standard_deviation_latency',
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
