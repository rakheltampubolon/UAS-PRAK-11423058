<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'lapangan_id', 'user_id', 'start_time', 'end_time', 'notes', 'status'
    ];

    public function lapangan()
    {
    	return $this->belongsTo(Lapangan::class, 'lapangan_id');
    }
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

}
