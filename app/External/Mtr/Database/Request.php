<?php declare(strict_types=1);

namespace JoshuaBehrens\NetworkCapacityLogger\External\Mtr\Database;

use DateTime;
use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Request
 * @property string $id
 * @property string|null $source
 * @property string|null $destination
 * @property DateTime $created_at
 * @property DateTime $updated_at
 * @property Collection|Hub[] $hubs
 */
class Request extends Model
{
    use Uuids,
        HasTimestamps;

    protected $table = 'mtr_requests';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'source',
        'destination',
    ];

    public function hubs(): HasMany
    {
        return $this->hasMany(Hub::class);
    }
}
