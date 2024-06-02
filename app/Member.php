<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
class Member extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'user_id', 'jenis_kelamin', 'no_hp', 'alamat'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
