<table class="ui celled striped compact table">
    <thead>
        <tr>
            <th>Kode Sub Kegiatan</th>
            <th>Uraian</th>
            <th>Satuan</th>
            <th>Indikator</th>
            <th>Capaian Awal</th>
            <th>Jumlah (Rp)</th>
            <th>Kondisi Akhir</th>
            <th class="center aligned">Aksi</th>
        </tr>
    </thead>

    <tbody>
    @if($items->isEmpty())
        <tr>
            <td colspan="8" class="center aligned">
                <div class="ui icon message">
                    <i class="inbox icon"></i>
                    <div class="content">
                        <div class="header">
                            Data RENSTRA Kosong
                        </div>
                        <p>
                            Untuk tahun {{ session('tahun', date('Y')) }}
                            belum ada data RENSTRA.
                        </p>
                    </div>
                </div>
            </td>
        </tr>
    @else
        @foreach($items as $item)
        <tr>
            <td>{{ $item->kd_sub_keg }}</td>
            <td>{{ \Illuminate\Support\Str::limit($item->uraian_prog_keg, 80) }}</td>
            <td>{{ $item->satuan }}</td>
            <td>{{ $item->indikator }}</td>
            <td class="right aligned">
                {{ number_format($item->data_capaian_awal ?? 0, 2, ',', '.') }}
            </td>
            <td class="right aligned">
                Rp {{ number_format($item->jumlah ?? 0, 0, ',', '.') }}
            </td>
            <td class="right aligned">
                {{ number_format($item->kondisi_akhir ?? 0, 2, ',', '.') }}
            </td>
            <td class="center aligned">
                <button class="ui mini icon blue button">
                    <i class="edit icon"></i>
                </button>
                <button class="ui mini icon red button">
                    <i class="trash icon"></i>
                </button>
            </td>
        </tr>
        @endforeach
    @endif
    </tbody>
</table>

@if(!empty($pagination))
    <div class="ui center aligned basic segment">
        {!! $pagination !!}
    </div>
@endif
