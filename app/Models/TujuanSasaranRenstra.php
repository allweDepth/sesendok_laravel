<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TujuanSasaranRenstra extends Model
{
    protected $table = 'tujuan_sasaran_renstra_neo';   // ← sesuaikan nama tabel sebenarnya

    protected $guarded = ['id'];

    protected $casts = [
        'tahun'     => 'integer',
        'setujui'   => 'boolean',
        'kunci'     => 'boolean',
    ];
}