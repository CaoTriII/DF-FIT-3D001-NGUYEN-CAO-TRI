<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;
class District extends Model
{
    use HasFactory;
            /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'district';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];


}
