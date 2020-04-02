<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class EventModel extends Model
{
    protected $table = "events";

    protected $fillable = [
        'user_id',
        'description',
        'from_date',
        'starting_time',
        'to_date',
        'ending_time',
        'location',
    ];
}
