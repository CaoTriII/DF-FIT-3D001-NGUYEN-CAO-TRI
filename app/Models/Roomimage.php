<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Roomimage extends Model
{
    use HasFactory;
             /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roomimage';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    public function room_image()
    {
        return $this->belongsTo(Room::class);
    }

}
