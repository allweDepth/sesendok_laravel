<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\RenstraSkpd;           // sesuaikan nama model Anda
use App\Models\TujuanSasaranRenstra;  // sesuaikan nama model Anda

class AnggaranController extends Controller
{
    // AnggaranController.php
    public function renstra()
    {
        return view('anggaran.renstra.index'); // file: resources/views/anggaran/renstra/index.blade.php
    }

    /**
     * Endpoint AJAX untuk load tabel Renstra atau Tujuan Sasaran
     */
    public function renstraTable(Request $request)
    {
        $tbl   = $request->input('tbl', 'renstra');
        $page  = $request->input('page', 1);
        $perPage = 15;

        // filter sesuai user & tahun (sesuaikan dengan logic Anda)
        $tahun   = session('tahun', date('Y'));
        $kdWil   = Auth::user()?->kd_wilayah ?? '00.00';
        $kdOpd   = Auth::user()?->kd_organisasi ?? '';

        $data = [];

        if ($tbl === 'renstra') {
            $query = RenstraSkpd::where('kd_wilayah', $kdWil)
                ->where('kd_opd', $kdOpd)
                ->where('tahun', $tahun)
                ->orderBy('kd_sub_keg');

            $items = $query->paginate($perPage, ['*'], 'page', $page);

            $data = [
                'html'       => view('anggaran.partials._table_renstra', compact('items'))->render(),
                'pagination' => $items->links('vendor.pagination.semantic-ui')->toHtml(),
                'total'      => number_format($query->sum('jumlah'), 2, ',', '.'),
            ];
        } elseif ($tbl === 'tujuan_sasaran_renstra') {
            $query = TujuanSasaranRenstra::where('kd_wilayah', $kdWil)
                ->where('kd_opd', $kdOpd)
                ->where('tahun', $tahun)
                ->orderBy('kelompok');

            $items = $query->paginate($perPage, ['*'], 'page', $page);

            $data = [
                'html'       => view('anggaran.partials._table_tujuan_sasaran', compact('items'))->render(),
                'pagination' => $items->links('vendor.pagination.semantic-ui')->toHtml(),
            ];
        }

        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }
}
