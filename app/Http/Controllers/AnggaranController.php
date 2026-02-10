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
        try {
            $tbl   = $request->input('tbl', 'renstra');
            $page  = $request->input('page', 1);
            $perPage = 15;

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

                // Kirim PAGINATION dan ITEMS ke view partial
                $pagination = $items->links('vendor.pagination.semantic-ui')->toHtml();

                $data = [
                    'html'       => view('anggaran.partials._table_renstra', compact('items', 'pagination'))->render(),  // <-- TAMBAH 'pagination' di compact
                    'pagination' => $pagination,  // <-- ini bisa dihapus kalau tidak dipakai di JS
                    'total'      => number_format($query->sum('jumlah'), 2, ',', '.'),
                ];
            }

            return response()->json([
                'success' => true,
                'data'    => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ], 500);
        }
    }
}
