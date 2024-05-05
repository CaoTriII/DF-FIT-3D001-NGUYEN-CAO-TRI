<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\District;
use App\Models\Room;

class Hotel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hotel';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function hotel()
    {
        return $this->belongsTo(District::class);
    }

    public function room()
    {
        return $this->hasMany(Room::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
