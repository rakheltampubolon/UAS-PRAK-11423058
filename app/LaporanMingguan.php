<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanMingguan extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */

     protected $table = 'laporan_mingguan';

    protected $fillable = [
        'tahun', 'bulan', 'minggu_ke', 'file_laporan'
    ];
}
