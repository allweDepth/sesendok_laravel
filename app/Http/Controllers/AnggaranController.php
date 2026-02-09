<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    public function renstra()
    {
        // return view renstra
        return view('anggaran.renstra'); // pastikan file resources/views/anggaran/renstra.blade.php ada
    }

}
