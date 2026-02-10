<table class="ui celled striped selectable unstackable table">
    <thead>
        <tr class="center aligned">
            <th>Kode</th>
            <th>Uraian Program/Kegiatan</th>
            <th>Satuan</th>
            <th>Indikator</th>
            <th>Data Awal</th>
            <th>Jumlah (Rp)</th>
            <th>Kondisi Akhir</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->kd_sub_keg }}</td>
            <td>{{ Str::limit($item->uraian_prog_keg, 80) }}</td>
            <td>{{ $item->satuan ?? '-' }}</td>
            <td>{{ $item->indikator ?? '-' }}</td>
            <td>{{ number_format($item->data_capaian_awal ?? 0, 2) }}</td>
            <td>Rp {{ number_format($item->jumlah ?? 0, 0, ',', '.') }}</td>
            <td>{{ number_format($item->kondisi_akhir ?? 0, 2) }}</td>
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
    </tbody>
    <tfoot>
        <tr>
            <th colspan="8">{!! $pagination !!}</th>
        </tr>
    </tfoot>
</table>