<tbody>
    @if($items->isEmpty())
        <tr>
            <td colspan="8" class="center aligned">
                <div class="ui icon message yellow">
                    <i class="info circle icon"></i>
                    <div class="content">
                        <div class="header">
                            Belum Ada Data RENSTRA
                        </div>
                        <p>Untuk tahun {{ session('tahun', date('Y')) }} belum ada data yang tersimpan. Silakan tambah data baru.</p>
                    </div>
                </div>
            </td>
        </tr>
    @else
        @foreach($items as $item)
        <tr>
            <td>{{ $item->kd_sub_keg ?? '-' }}</td>
            <td>{{ Str::limit($item->uraian_prog_keg ?? 'Tidak ada uraian', 80) }}</td>
            <td>{{ $item->satuan ?? '-' }}</td>
            <td>{{ $item->indikator ?? '-' }}</td>
            <td>{{ number_format($item->data_capaian_awal ?? 0, 2, ',', '.') }}</td>
            <td>Rp {{ number_format($item->jumlah ?? 0, 0, ',', '.') }}</td>
            <td>{{ number_format($item->kondisi_akhir ?? 0, 2, ',', '.') }}</td>
            <td class="center aligned">
                <button class="ui mini icon button blue" data-action="edit" data-id="{{ $item->id }}">
                    <i class="edit icon"></i>
                </button>
                <button class="ui mini icon button red" data-action="delete" data-id="{{ $item->id }}">
                    <i class="trash icon"></i>
                </button>
            </td>
        </tr>
        @endforeach
    @endif
</tbody>