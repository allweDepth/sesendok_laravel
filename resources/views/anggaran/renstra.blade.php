@extends('layouts.auth')

@section('main-content')
<div class="ui stackable grid">
    <div class="two wide left column">
        <div class="ui red secondary vertical pointing fluid menu">
            <a class="active item" data-tab="tab_renstra" tbl="renstra">
                <i class="clipboard list icon"></i> Renstra
            </a>
            <a class="item" data-tab="tab_renstra" tbl="tujuan_sasaran_renstra">
                <i class="bullseye icon"></i> Tujuan dan Sasaran
            </a>
        </div>
    </div>

    <div class="fourteen wide stretched right column">
        <h1 class="ui header">
            Rencana Strategis (Renstra)
            <div class="sub header">Dokumen perencanaan berorientasi hasil</div>
        </h1>

        <div class="ui hidden divider"></div>

        <!-- Statistik ringkas (diisi via JS atau AJAX nanti) -->
        <div class="ui grid">
            <div class="five wide column">
                <div class="ui orange message">
                    <div class="header">Total Anggaran</div>
                    <p name="total-anggaran">Rp —</p>
                </div>
            </div>
            <!-- tambahkan kolom statistik lain sesuai kebutuhan -->
        </div>

        <div class="ui fluid container">
            <div class="ui hidden divider"></div>

            <div class="ui right floated basic icon buttons">
                <button class="ui button" jns="add" tbl="renstra" data-tooltip="Tambah">
                    <i class="plus icon"></i>
                </button>
                <button class="ui button" jns="import" tbl="renstra" data-tooltip="Import XLSX">
                    <i class="upload icon"></i>
                </button>
                <button class="ui button" jns="download" tbl="renstra" data-tooltip="Download">
                    <i class="download icon"></i>
                </button>
            </div>

            <h3 class="ui dividing header">Data Renstra</h3>

            <div id="renstra-table-container" class="ui long scrolling fluid container">
                <!-- tabel akan dimuat di sini via AJAX -->
            </div>
        </div>
    </div>
</div>

<!-- Modal reusable (bisa dibedakan per tbl nanti) -->
<div id="modal-renstra" class="ui modal">
    <div class="header">Form Renstra</div>
    <div class="content scrolling">
        <form id="form-renstra" class="ui form">
            @csrf
            <input type="hidden" name="id">
            <input type="hidden" name="tbl"> <!-- renstra atau tujuan_sasaran_renstra -->

            <!-- field dasar (akan diubah via JS sesuai tbl) -->
            <div class="field">
                <label>Uraian</label>
                <textarea name="uraian" required></textarea>
            </div>

            <button type="submit" class="ui positive button">Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    const container = $('#renstra-table-container');

    function loadTable(tbl = 'renstra', page = 1) {
        $.ajax({
            url: '{{ route("anggaran.renstra.table") }}',
            data: { tbl: tbl, page: page },
            success: function(res) {
                if (res.success) {
                    container.html(res.data.html);

                    // update tombol action sesuai tbl aktif
                    $('.ui.right.floated.basic.icon.buttons button').attr('tbl', tbl);

                    // handle klik pagination
                    container.find('[name="page"]').on('click', function(e) {
                        e.preventDefault();
                        const hal = $(this).attr('hal');
                        loadTable(tbl, hal);
                    });

                    // update total anggaran (khusus renstra)
                    if (tbl === 'renstra' && res.data.total) {
                        $('[name="total-anggaran"]').text('Rp ' + res.data.total);
                    }
                }
            }
        });
    }

    // klik tab menu
    $('.ui.secondary.vertical.pointing.menu .item').on('click', function() {
        $('.ui.secondary.vertical.pointing.menu .item').removeClass('active');
        $(this).addClass('active');

        const tbl = $(this).attr('tbl');
        loadTable(tbl);
    });

    // load awal
    loadTable('renstra');

    // tombol tambah
    $('body').on('click', '[jns="add"]', function() {
        const tbl = $(this).attr('tbl');
        $('#form-renstra')[0].reset();
        $('#form-renstra [name="tbl"]').val(tbl);
        $('#modal-renstra .header').text('Tambah ' + (tbl === 'renstra' ? 'Renstra' : 'Tujuan & Sasaran'));
        $('#modal-renstra').modal('show');
    });

    // submit form (contoh sederhana)
    $('#form-renstra').on('submit', function(e) {
        e.preventDefault();
        alert('Implementasi simpan ' + $('#form-renstra [name="tbl"]').val() + ' di sini');
        $('#modal-renstra').modal('hide');
        // refresh tabel aktif
        const tblAktif = $('.ui.secondary.vertical.pointing.menu .active.item').attr('tbl');
        loadTable(tblAktif);
    });
});
</script>
@endpush