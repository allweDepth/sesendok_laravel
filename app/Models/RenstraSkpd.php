<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RenstraSkpd extends Model
{
    protected $table = 'renstra_skpd_neo';     // ← sesuaikan nama tabel sebenarnya

    protected $guarded = ['id'];

    protected $casts = [
        'tahun'               => 'integer',
        'target_thn_1'        => 'decimal:2',
        'target_thn_2'        => 'decimal:2',
        'target_thn_3'        => 'decimal:2',
        'target_thn_4'        => 'decimal:2',
        'target_thn_5'        => 'decimal:2',
        'dana_thn_1'          => 'decimal:2',
        'dana_thn_2'          => 'decimal:2',
        'dana_thn_3'          => 'decimal:2',
        'dana_thn_4'          => 'decimal:2',
        'dana_thn_5'          => 'decimal:2',
        'jumlah'              => 'decimal:2',
        'setujui'             => 'boolean',
        'kunci'               => 'boolean',
    ];
}