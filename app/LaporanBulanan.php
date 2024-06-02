<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanBulanan extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */

     protected $table = 'laporan_bulanan';

    protected $fillable = [
        'tahun', 'bulan', 'file_laporan'
    ];
}
