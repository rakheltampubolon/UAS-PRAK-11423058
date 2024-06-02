<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanTahunan extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */

     protected $table = 'laporan_tahunan';

    protected $fillable = [
        'tahun', 'file_laporan'
    ];
}
