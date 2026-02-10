@extends('layouts.auth')

@section('main-content')
<div class="ui segment">
    <h2 class="ui header">
        <i class="sitemap purple icon"></i>
        <div class="content">Rencana Strategis (RENSTRA)</div>
    </h2>

    <div class="ui right floated basic icon buttons">
        <button class="ui primary button" id="btn-tambah-renstra">
            <i class="plus icon"></i> Tambah Data
        </button>
        <button class="ui button" id="btn-import-renstra">
            <i class="upload icon"></i> Import XLSX
        </button>
        <button class="ui button" id="btn-download-renstra">
            <i class="download icon"></i> Download Template
        </button>
    </div>

    <div id="renstra-table-container" class="ui segment">
        <div class="ui inverted dimmer" id="renstra-loading">
            <div class="ui large text loader">Memuat data RENSTRA...</div>
        </div>

        <div id="renstra-table-content"></div>
    </div>
</div>

<!-- Modal -->
<div id="modal-renstra" class="ui modal">
    <div class="header">Form RENSTRA</div>
    <div class="content scrolling">
        <form id="form-renstra" class="ui form">
            @csrf
            <input type="hidden" name="id">
            <input type="hidden" name="_method" value="POST">

            <div class="field">
                <label>Kode Sub Kegiatan</label>
                <input type="text" name="kd_sub_keg" placeholder="Contoh: 1.3.02.2.01" required>
            </div>

            <div class="field">
                <label>Uraian Program/Kegiatan</label>
                <textarea name="uraian_prog_keg" rows="3" required></textarea>
            </div>

            <div class="two fields">
                <div class="field">
                    <label>Satuan</label>
                    <input type="text" name="satuan" placeholder="Km, Unit, Persen">
                </div>
                <div class="field">
                    <label>Jumlah (Rp)</label>
                    <input type="number" name="jumlah" step="1" min="0" required>
                </div>
            </div>

            <div class="two fields">
                <div class="field">
                    <label>Indikator Kinerja</label>
                    <input type="text" name="indikator">
                </div>
                <div class="field">
                    <label>Data Capaian Awal</label>
                    <input type="number" name="data_capaian_awal" step="0.01" value="0.00">
                </div>
            </div>

            <div class="field">
                <label>Kondisi Akhir Renstra</label>
                <input type="number" name="kondisi_akhir" step="0.01" value="0.00">
            </div>

            <div class="ui error message" style="display:none;">
                <div class="header">Periksa kembali isian</div>
                <ul class="list"></ul>
            </div>

            <button type="submit" class="ui positive button">Simpan</button>
            <button type="button" class="ui button" id="btn-batal-modal">Batal</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
    console.log("Script RENSTRA start");

    const container = $('#renstra-table-container');
    const content   = $('#renstra-table-content');
    const loading   = $('#renstra-loading');

    function loadRenstraTable(page = 1) {
        console.log("Load page " + page);
        loading.addClass('active');
        content.empty();

        $.ajax({
            url: '{{ route("anggaran.renstra.table") }}',
            data: { page: page },
            success: function(res) {
                console.log("AJAX success:", res);

                if (res.success && res.data && res.data.html) {
                    content.html(res.data.html);

                    // Pastikan pagination klik jalan
                    content.find('.pagination a').on('click', function(e) {
                        e.preventDefault();
                        const url = $(this).attr('href');
                        const page = new URLSearchParams(new URL(url).search).get('page') || 1;
                        loadRenstraTable(page);
                    });
                } else {
                    content.html(`
                        <div class="ui warning message">
                            <div class="header">Tidak ada data RENSTRA</div>
                            <p>Untuk tahun {{ session('tahun', date('Y')) }} belum ada data. Tambah dulu ya.</p>
                        </div>
                    `);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", status, error);
                content.html(`
                    <div class="ui error message">
                        <div class="header">Gagal memuat data</div>
                        <p>${error}</p>
                    </div>
                `);
            },
            complete: function() {
                console.log("AJAX complete - hide loading");
                loading.removeClass('active'); // PASTI BERHENTI DISINI
            }
        });
    }

    // Load pertama
    loadRenstraTable();

    // Tombol Tambah
    $('#btn-tambah-renstra').on('click', () => {
        $('#form-renstra')[0].reset();
        $('#form-renstra [name="_method"]').val('POST');
        $('#modal-renstra .header').text('Tambah Data RENSTRA');
        $('#modal-renstra').modal('show');
    });

    // Batal
    $('#btn-batal-modal').on('click', () => {
        $('#modal-renstra').modal('hide');
    });

    // Submit form
    $('#form-renstra').on('submit', function(e) {
        e.preventDefault();

        if (!$(this).form('validate form')) return;

        const formData = new FormData(this);
        const method   = formData.get('_method') || 'POST';
        const url      = method === 'POST' 
            ? '{{ url("/anggaran/renstra") }}' 
            : '{{ url("/anggaran/renstra") }}/' + formData.get('id');

        $.ajax({
            url: url,
            method: method,
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.success) {
                    alert(res.message || 'Data tersimpan');
                    $('#modal-renstra').modal('hide');
                    loadRenstraTable();
                } else {
                    alert('Gagal: ' + (res.message || 'Error'));
                }
            },
            error: function() {
                alert('Gagal koneksi server');
            }
        });
    });

    $('.ui.dropdown').dropdown();
    $('.ui.checkbox').checkbox();
});
</script>
@endpush