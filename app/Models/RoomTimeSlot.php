<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Material
 *
 * @property string $id
 * @property string $room_id
 * @property string $time_slot_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 *
 * @package App\Models
 */


class RoomTimeSlot extends Model
{
    protected $table     = 'room_time_slot';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    use HasFactory;

    protected $fillable = [
    ];

}
