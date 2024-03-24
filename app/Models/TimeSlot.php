<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Room;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Material
 *
 * @property string $id
 * @property string $room_id
 * @property string $start_time
 * @property string $end_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Room $room
 *
 *
 * @package App\Models
 */

class TimeSlot extends Model
{
    protected $table     = 'time_slots';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    use HasUlids, HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
    ];

    public function room(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'room_time_slots', 'time_slot_id', 'room_id');
    }

}
