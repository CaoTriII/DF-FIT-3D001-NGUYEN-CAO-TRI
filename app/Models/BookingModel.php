<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\BookingUser;
class BookingModel extends Model
{
    use HasFactory;
                /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bookingdetail';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];


    public function Room()
    {
        return $this->belongsTo(Room::class);
    }
    public function Hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function Booking()
    {
        return $this->belongsTo(BookingUser::class, 'booking_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
