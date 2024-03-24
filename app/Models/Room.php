<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * Class Material
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Room $room
 *
 *
 * @package App\Models
 */

class Room extends Model
{
    use HasUlids, HasFactory;

    protected $table     = 'rooms';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'description',
        'image',
        'capacity',
    ];

    public function timeSlots(): BelongsToMany
    {
        return $this->belongsToMany(TimeSlot::class, 'room_time_slot', 'room_id', 'time_slot_id');
    }

}
