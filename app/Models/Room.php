<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Hotel;
use App\Models\Roomimage;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
         /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'room';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function room_image()
    {
        return $this->hasMany(RoomImage::class);
    }
}

