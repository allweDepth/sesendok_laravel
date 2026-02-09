@extends('layouts.auth')

@section('main-content')
<div class="ui stackable grid">
    <div class="two wide left column">
        <div class="ui red secondary vertical pointing fluid menu">
            <a class="active item inayah" data-tab="tab_renstra" tbl="renstra">
                Renstra
            </a>
            <a class="item inayah" data-tab="tab_renstra" tbl="tujuan_sasaran_renstra">
                Tujuan dan Sasaran
            </a>
        </div>
    </div>
    <div class="fourteen wide stretched right column">
        <h1 class="ui header">Rencana Strategis (Renstra) <div class="sub header">dokumen perencanaan
                berorientasi
                pada hasil yang ingin dicapai</div>
        </h1>
        <div class="ui hidden divider"></div>
        <div class="ui stretched stackable five column grid">
            <div class="column">
                <div class="ui orange icon message goyang"><i class="book icon"></i>
                    <div class="content">
                        <div class="header">Total Anggaran</div>
                        <p name="total-anggaran"></p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui icon yellow message goyang">
                    <i class="chart icon" name="chart-realisasi-fisik-mini"></i>
                    <div class="content">
                        <div class="header">Jumlah Program</div>
                        <p name="realisasi-fisik"></p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui olive icon message goyang"><i class="chart icon" name="chart-realisasi-keu-mini"></i>
                    <div class="content">
                        <div class="header">Jumlah Kegiatan</div>
                        <p name="realisasi-keu"></p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui icon red message goyang"><i class="spinner loading icon"></i>
                    <div class="content">
                        <div class="header">Jumlah Sub Kegiatan</div>
                        <p name="sisa-fisik"></p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="ui positive icon message goyang"><i class="spinner loading icon"></i>
                    <div class="content">
                        <div class="header">Sisa Keuangan</div>
                        <p name="sisa-keu"></p>
                    </div>
                </div>
            </div>
            <div class="ui fluid container">
                <div class="ui hidden divider"></div>
                <div class="ui right floated basic icon buttons">
                    <button class="ui button" name="flyout" data-tooltip="Tambah Data" data-position="bottom center"
                        jns="add" tbl="renstra"><i class="plus icon"></i></button>
                    <button class="ui button" name="flyout" jns="import" data-tooltip="Import XLSX"
                        data-position="bottom center" tbl="renstra"><i class="upload icon"></i></button> <button
                        class="ui button" data-tooltip="Download" data-position="bottom center" name="ungguh" jns="dok"
                        tbl="renstra" type="submit"><i class="alternate download icon"></i></button>
                </div>
                <h3 class="ui dividing header"><i class="left align icon"></i>Tabel Dokumen</h3>
                <div class="ui hidden divider"></div>
                <div class="ui hidden divider"></div>
                <div class="ui long scrolling fluid container">
                    <table class="ui head foot stuck unstackable celled striped table insert">
                        <thead>
                            <tr class="center aligned">
                                <th>Kode</th>
                                <th>Program dan Kegiatan</th>
                                <th>Satuan</th>
                                <th>Indikator Kinerja</th>
                                <th>Data Capaian Awal</th>
                                <th class="collapsing">Jumlah</th>
                                <th>Kondisi Kinerja Akhir Renstra</th>
                                <th class="collapsing">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id_row="95">
                                <td klm="kd_sub_keg">1</td>
                                <td klm="uraian_prog_keg">URUSAN PEMERINTAHAN WAJIB YANG BERKAITAN DENGAN PELAYANAN
                                    DASAR</td>
                                <td klm="satuan">
                                    <div contenteditable=""></div>
                                </td>
                                <td klm="indikator">
                                    <div contenteditable=""></div>
                                </td>
                                <td klm="data_capaian_awal">
                                    <div contenteditable="" rms="" onkeypress="return rumus(event);">0,00</div>
                                </td>
                                <td klm="kondisi_akhir">0,00</td>
                                <td klm="jumlah">977.945.193.060,23</td>
                                <td class="center aligned">
                                    <div class="ui icon basic mini buttons"><button class="ui red button" name="del_row"
                                            jns="edit" tbl="renstra" id_row="95"><i
                                                class="trash alternate outline red icon"></i></button></div>
                                </td>
                            </tr>
                            <tr id_row="94">
                                <td klm="kd_sub_keg">1.3</td>
                                <td klm="uraian_prog_keg">URUSAN PEMERINTAHAN BIDANG PEKERJAAN UMUMDAN PENATAAN RUANG
                                </td>
                                <td klm="satuan">
                                    <div contenteditable=""></div>
                                </td>
                                <td klm="indikator">
                                    <div contenteditable=""></div>
                                </td>
                                <td klm="data_capaian_awal">
                                    <div contenteditable="" rms="" onkeypress="return rumus(event);">0,00</div>
                                </td>
                                <td klm="kondisi_akhir">0,00</td>
                                <td klm="jumlah">977.945.193.060,23</td>
                                <td class="center aligned">
                                    <div class="ui icon basic mini buttons"><button class="ui red button" name="del_row"
                                            jns="edit" tbl="renstra" id_row="94"><i
                                                class="trash alternate outline red icon"></i></button></div>
                                </td>
                            </tr>
                            <tr id_row="132">
                                <td klm="kd_sub_keg">1.3.02</td>
                                <td klm="uraian_prog_keg">PROGRAM PENGELOLAAN SUMBER DAYA AIR (SDA)</td>
                                <td klm="satuan">
                                    <div contenteditable=""></div>
                                </td>
                                <td klm="indikator">
                                    <div contenteditable=""></div>
                                </td>
                                <td klm="data_capaian_awal">
                                    <div contenteditable="" rms="" onkeypress="return rumus(event);">0,00</div>
                                </td>
                                <td klm="kondisi_akhir">0,00</td>
                                <td klm="jumlah">141.804.961.217,00</td>
                                <td class="center aligned">
                                    <div class="ui icon basic mini buttons"><button class="ui red button" name="del_row"
                                            jns="edit" tbl="renstra" id_row="132"><i
                                                class="trash alternate outline red icon"></i></button></div>
                                </td>
                            </tr>
                            <tr id_row="133">
                                <td klm="kd_sub_keg">1.3.02.2.01</td>
                                <td klm="uraian_prog_keg">Pengelolaan SDA dan Bangunan Pengaman Pantai pada Wilayah
                                    Sungai (WS) dalam 1 (Satu) Daerah Kabupaten/Kota</td>
                                <td klm="satuan">
                                    <div contenteditable=""></div>
                                </td>
                                <td klm="indikator">
                                    <div contenteditable=""></div>
                                </td>
                                <td klm="data_capaian_awal">
                                    <div contenteditable="" rms="" onkeypress="return rumus(event);">0,00</div>
                                </td>
                                <td klm="kondisi_akhir">0,00</td>
                                <td klm="jumlah">40.123.461.217,00</td>
                                <td class="center aligned">
                                    <div class="ui icon basic mini buttons"><button class="ui red button" name="del_row"
                                            jns="edit" tbl="renstra" id_row="133"><i
                                                class="trash alternate outline red icon"></i></button></div>
                                </td>
                            </tr>
                            <tr id_row="136">
                                <td klm="kd_sub_keg">1.3.02.2.01.0093</td>
                                <td klm="uraian_prog_keg">Normalisasi/Restorasi Sungai</td>
                                <td klm="satuan">
                                    <div contenteditable="">km</div>
                                </td>
                                <td klm="indikator">
                                    <div contenteditable="">Panjang Sungai yang Dinormalisasi/Direstorasi</div>
                                </td>
                                <td klm="data_capaian_awal">
                                    <div contenteditable="" rms="" onkeypress="return rumus(event);">0,00</div>
                                </td>
                                <td klm="kondisi_akhir">325.590,07</td>
                                <td klm="jumlah">24.419.255.000,00</td>
                                <td class="center aligned">
                                    <div class="ui icon basic mini buttons"> <button class="ui button" name="flyout"
                                            jns="edit" tbl="renstra" id_row="136"><i
                                                class="edit outline blue icon"></i></button><button
                                            class="ui red button" name="del_row" jns="edit" tbl="renstra"
                                            id_row="136"><i class="trash alternate outline red icon"></i></button></div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="right aligned" colspan="22">
                                    <div class="ui center pagination menu"><a class="disabled icon item"><i
                                                class="angle left icon"></i></a><a class="active item"
                                            tbl="renstra">1</a><a class="item" name="page" hal="2" ret="go"
                                            tbl="renstra">2</a><a class="item" name="page" hal="3" ret="go"
                                            tbl="renstra">3</a><a class="item" name="page" hal="19" ret="go"
                                            tbl="renstra"><i class="angle double right chevron icon"></i></a><a
                                            class="icon item" name="page" hal="1" ret="next" tbl="renstra"><i
                                                class="angle right icon"></i></a></div>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection