<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookingModel;
class BookingUser extends Model
{
    use HasFactory;

   protected $table = 'booking';
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $guarded = [];

   public function bookingDetails()
   {
       return $this->hasMany(BookingModel::class, 'booking_id');
   }

}
