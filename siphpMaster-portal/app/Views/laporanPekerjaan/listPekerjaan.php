<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Pekerjaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Pekerjaan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline" style="border: #3c4b64;">
                <div class="card-body box-profile">
                    <div class="row">
                        <div class="col-md-6 py-1">
                            <div class="input-group">
                                <?php if ($kantor != null) {
                                    if ($kantor != '98') {
                                        echo '<button type="button" id="btn-modal-tambah" class="btn btn-info tombol mr-2" style="background-color: #3c4b64; border:none;"><i class="fas fa-plus mr-2"></i>Tambah Pekerjaan</button>';
                                        echo '<button type="button" id="btn-modal-tambah-master-pkj" class="btn btn-info tombol mr-2" style="background-color: #3c4b64; border:none;"><i class="fas fa-plus mr-2"></i>Tambah Jenis Pekerjaan</button>';
                                }
                                } ?>
                                <select name="tahun" class="form-control tahun" style="border-radius: 5px;">
                                    <option value="">--PILIH TAHUN--</option>
                                    <?php if ($tahun_tersedia != null) : ?>
                                        <?php foreach ($tahun_tersedia as $tahun) : ?>
                                            <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <select name="bulan" class="form-control ml-2 bulan opacity-0" style="border-radius: 5px;">
                                    <option value="">--PILIH BULAN--</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="12">November</option>
                                    <option value="12">Desember</option>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-6 py-1">
                            <div>
                                <div id="tabelData_filter" class="input-group input-group-md float-right" style="width: 250px">
                                    <input type="search" id="pencarian" name="keyword" class="form-control float-right auto_search" placeholder="Search ..." />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body table-responsive p-0 overflow-hidden">

                            <table class="table table-hover " id="tabelData">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>TANGGAL</th>
                                        <th>URAIAN KEGIATAN</th>
                                        <th>JUMLAH TARGET</th>
                                        <th>SATUAN</th>
                                        <th>WAKTU TARGET</th>
                                        <th>JUMLAH REALISASI</th>
                                        <th>WAKTU REALISASI</th>
                                        <th>STATUS VERIFIKASI</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $start = 0;
                                    $no = 1;
                                    if ($list_full_laporan_harian != NULL) : ?>
                                        <?php

                                        foreach ($list_full_laporan_harian as $list) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td id="tgl-kegiatan-tabel"><?= $list['created_at']; ?></td>
                                                <td id="<?= $list['id']; ?>" name ="<?= $list['kdkerjaan']; ?>" ><?= $list['nmkerjaan']; ?></td>
                                                <td id="kuantitas-target-tabel"><?= $list['kuantitastarget']; ?></td>
                                                <td id="satuan-tabel"><?= $list['satuan']; ?></td>
                                                <td id="tgl-target-tabel"><?= $list['waktutarget']; ?></td>
                                                <td id="kuantitas-realisasi-tabel"><?= $list['kuantitasrealisasi']; ?></td>
                                                <td id="tgl-realisasi-tabel"><?= $list['wakturealisasi']; ?></td>
                                                <td>
                                                    <form action="<?= base_url('verifikasi/insert') ?>" method="POST">
                                                        <input type="hidden" name="id" value="<?= $list['id']; ?>">
                                                        <?php if ($list['statusverifikasi'] == 'accepted') : ?>
                                                            <span class="text-success">Accepted</span>
                                                            <button type="submit" name="verifikasi" value="edit" class="btn btn-primary"> <i class="fas fa-sync-alt"></i></button>
                                                        <?php elseif ($list['statusverifikasi'] == 'rejected') : ?>
                                                            <span class="text-danger">Rejected</span>
                                                            <button type="submit" name="verifikasi" value="edit" class="btn btn-primary"> <i class="fas fa-sync-alt"></i></button>
                                                        <?php else : ?>
                                                            <button type="submit" name="verifikasi" value="accepted" class="btn btn-success">Accept</button>
                                                            <button type="submit" name="verifikasi" value="rejected" class="btn btn-danger">Reject</button>
                                                        <?php endif; ?>
                                                        
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('/showDetailLaporanPekerjaan/' . $list['id']) ?>" type="button" title="Detail" id="btn-detail" class="btn btn-info btn-xs tombol" style="background-color: #E18939; border:none;">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="#" type="button" title="Edit pekerjaan" id="btn-edit" data-target="#modal-edit" class="btn btn-info btn-xs tombol" style="background-color: #2D95C9; border:none;">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a type="button" data-toggle="modal" title="Assign" data-target="#modal-assign" id="btn-assign" class="btn btn-info btn-xs tombol" style="background-color: #2D76C3; border:none;">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a type="button" data-toggle="modal" title="Realisasi" data-target="#modal-realisasi" id="btn-realisasi" class="btn btn-info btn-xs tombol" style="background-color: #6F78C5; border:none;">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="<?= base_url('/hapusPekerjaan/' . $list['id']) ?>" type="button" title="Hapus" id="del-pekerjaan" class="btn btn-info btn-xs tombol" style="background-color: #FF0000; border:none;">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

<!-- MODAL TAMBAH KEGIATAN -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog  modal-xl ">
        <form id="form-tambah" action="<?= base_url('/saveLaporanPekerjaan'); ?>" method="post" class="modal-content form-tambah" enctype="multipart/form-data">
            <input type="text" id="id_kegiatan" name="id_kegiatan" class="d-none">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pekerjaan</h4>
                <button id="btn-close-modal-tambah" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 py-3">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="form-group">
                            <p>Tanggal Pekerjaan di buat
                            </p>
                            <h2 class="mb-3" id="tanggal-tambah"></h2>
                            <input type="date" class="form-control d-none" name="tanggal" id="hari-ini" class="form-control">
                        </div>
                    </div>
                </div>

                <!-- lama -->
                <div class="row mb-2">
                    <div class="col-5">
                        <hr>
                    </div>
                    <div class="col-2 text-center">
                        <em><strong>Detail Pekerjaan</strong></em>
                    </div>
                    <div class="col-5">
                        <hr>
                    </div>
                </div>
                <div id="lama">
                    <div class="row rounded position-relative pt-2 kegiatan-baru ">
                        <div class="col-xl-1 baris-kegiatan">
                            <div class="row"><strong>NO</strong></div>
                            <div class="row">1</div>
                        </div>
                        <div class="col-xl-4 baris-kegiatan">
                            <div class="row"><strong>Pekerjaan</strong></div>
                            <div class="row px-1  w-100">
                                <div class="input-group  w-100">
                                    <select class=" form-control  w-100" name="field_pekerjaan[]" required>
                                        <?php if ($list_pekerjaan != NULL) : ?>
                                            <?php foreach ($list_pekerjaan as $pekerjaan) : ?>
                                                <option value="<?= $pekerjaan['id']; ?>"><?= $pekerjaan['nmkerjaan']; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 baris-kegiatan">
                            <div class="row"><strong>Jumlah</strong></div>
                            <div class="row px-1  w-100">
                                <div class="form-group  w-100">
                                    <input type="number" class="form-control  w-100" name="field_jumlah[]" min="1" value="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 baris-kegiatan">
                            <div class="row"><strong>Satuan</strong></div>
                            <div class="row px-1  w-100">
                                <div class="input-group  w-100">
                                    <select class=" form-control  w-100" name="field_satuan[]" required>
                                        <?php if ($list_satuan != NULL) : ?>
                                            <?php foreach ($list_satuan as $satuan) : ?>
                                                <option value="<?= $satuan['nama_satuan']; ?>"><?= $satuan['nama_satuan']; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 baris-kegiatan">
                            <div class="row"><strong>Deadline</strong></div>

                            <div class="row px-1  w-100">
                                <div class="form-group  w-100 position-relative">
                                    <input type="date" class="form-control  w-100" name="field_deadline[]" rows="1" placeholder="Tanggal Deadline" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="baru">
                </div>
                <!-- tombol -->
                <div class="row ">
                    <div class="col-12 py-3 px-0">
                        <button id="tambah-baris" type="button" class="btn btn-default w-100 font-weight-bold">
                            <i class="fas fa-plus mr-2"></i>Tambah
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between position-relative">
                <button id="btn-close-modal-tambah2" type="button" class="btn btn-default">Tutup</button>
                <button id="tombol-simpan" type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Simpan</button>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- //MODAL TAMBAH KEGIATAN -->

<!-- MODAL EDIT PEKERJAAN -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl ">
        <form id="form-tambah" action="<?= base_url('/updateLaporanPekerjaan'); ?>" method="post" class="modal-content form-tambah" enctype="multipart/form-data">
            <input type="text" id="id_kegiatan" name="id_kegiatan" class="d-none">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pekerjaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 py-3">
                <div class="row">
                    <div class="col-12 p-0">
                    </div>
                </div>

                <!-- lama -->
                <div class="row mb-2">
                    <div class="col-5">
                        <hr>
                    </div>
                    <div class="col-2 text-center">
                        <em><strong>Detail Pekerjaan</strong></em>
                    </div>
                    <div class="col-5">
                        <hr>
                    </div>
                </div>
                <div id="lama">
                    <div class="row rounded position-relative pt-2 kegiatan-baru ">
                        <div class="col-xl-1 baris-kegiatan">
                            <div class="row"><strong>NO</strong></div>
                            <div class="row">1</div>
                        </div>
                        <div class="col-xl-4 baris-kegiatan">
                            <div class="row"><strong>Pekerjaan</strong></div>
                            <div class="row px-1  w-100">
                                <div class="form-group  w-100">
                                    <h5 id='edit-nama-kerjaan'>Tes</h5>
                                    <input type="text" class="form-control w-100" name="id_kerjaan" id="id-kerjaan-edit">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-1 baris-kegiatan">
                            <div class="row"><strong>Jumlah</strong></div>
                            <div class="row px-1  w-100">
                                <div class="form-group  w-100">
                                    <input type="number" class="form-control  w-100" name="field_jumlah[]" min="1" value="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 baris-kegiatan">
                            <div class="row"><strong>Satuan</strong></div>
                            <div class="row px-1  w-100">
                                <div class="input-group  w-100">
                                    <select class=" form-control  w-100" name="field_satuan[]" required>
                                        <?php if ($list_satuan != NULL) : ?>
                                            <?php foreach ($list_satuan as $satuan) : ?>
                                                <option value="<?= $satuan['nama_satuan']; ?>"><?= $satuan['nama_satuan']; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 baris-kegiatan">
                            <div class="row"><strong>Deadline</strong></div>

                            <div class="row px-1  w-100">
                                <div class="form-group  w-100 position-relative">
                                    <input type="date" class="form-control  w-100" name="field_deadline[]" rows="1" placeholder="Tanggal Deadline" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between position-relative">
                <button id="btn-close-modal-tambah2" type="button" class="btn btn-default">Tutup</button>
                <button id="tombol-simpan" type="submit" class="btn btn-info tombol" style="background-color: #3c4b64; border:none;">Simpan</button>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- //MODAL EDIT PEKERJAAN -->


<!-- MODAL DETAIL -->
<div class="modal fade" id="<?= $modal_detail; ?>" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header pt-3" style="border: none;">
                <a href="<?= base_url('/listPekerjaan'); ?>" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body px-5 py-3">
                <div class="row mb-2">
                    <div class="col-md-12 p-0">
                        <p>Detail Pekerjaan Kab/Kota
                        </p>
                        <?php if ($laporan_harian_tertentu != NULL) : ?>
                            <h5 class="mb-1" id="judul-detail"><strong><?= $laporan_harian_tertentu['0']['nmkerjaan']; ?></strong></h5>
                            <p>Last Modified : <?= $laporan_harian_tertentu['0']['updated_at']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>SATKER</th>
                                    <th>JUMLAH TARGET</th>
                                    <th>WAKTU TARGET</th>
                                    <th>JUMLAH REALISASI</th>
                                    <th>WAKTU REALISASI</th>
                                    <th>BUKTI REALISASI</th>
                                    <th>KETERANGAN TARGET</th>
                                    <th>KETERANGAN WAKTU</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($laporan_harian_tertentu != NULL) : ?>
                                    <input type="hidden" name="id_laporan_harian_tertentu" value="<?= $laporan_harian_tertentu['0']['id']; ?>">
                                    <?php for ($i = 0; $i < count($list_uraian = $laporan_harian_tertentu); $i++): ?>
                                        <tr>
                                            <td>
                                                <?= $i + 1; ?>
                                            </td>
                                            <td>
                                                <?= $list_uraian[$i]['kdsatker'] . ". " . $list_uraian[$i]['satker'] ; ?>
                                            </td>
                                            <td>
                                                <?= $list_uraian[$i]['kuantitastarget']; ?>
                                            </td>
                                            <td>
                                                <?= $list_uraian[$i]['waktutarget']; ?>
                                            </td>
                                            <td>
                                                <?= $list_uraian[$i]['kuantitasrealisasi']; ?>
                                            </td>
                                            <td>
                                                <?= $list_uraian[$i]['wakturealisasi']; ?>
                                            </td>
                                            <td>
                                                <?php if ($list_uraian[$i]['bukti']): ?>
                                                    <a href="<?= 'https://' . $list_uraian[$i]['bukti']; ?>" download>
                                                    <img src="<?= base_url('bukti/' . $list_uraian[$i]['bukti']); ?>" alt="Bukti Realisasi">
                                               <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($list_uraian[$i]['statuspenyelesaiiantarget'] == 1) : ?>
                                                        <?="Target Terpenuhi"?>
                                                    <?php else: ?>
                                                        <?="Target Belum Terpenuhi"?>
                                                <?php endif; ?>
                                                
                                            </td>
                                            <td>
                                                <?php if ($list_uraian[$i]['statuspenyelesaiianwaktu'] == 1) : ?>
                                                        <?="Tepat Waktu"?>
                                                    <?php else: ?>
                                                        <?="Terlambat"?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL DETAIL -->

<!-- MODAL REALISASI -->
<div class="modal fade" id="modal-realisasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--<form action="<?= base_url('/updateRealisasiPekerjaan'); ?>" method="POST" class="modal-content">-->
        <form action="<?= base_url('/updateRealisasiPekerjaan'); ?>" method="POST" class="modal-content" enctype="multipart/form-data">
            
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Input Realisasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h5 id='judul-kerjaan-realisasi'><strong>Tes</strong></h5>
                        <input type="text" class="form-control" name="id_kerjaan" id="id-kerjaan-realisasi" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group text-left col-6">
                        <label>Kuantitas Realisasi</label>
                    </div>
                    <div class="form-group text-center col-6">
                        <div class="password">
                            <input type="number" class="form-control  w-100" name="field_kuantitas_realisasi" min="0" value="0" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group text-left col-6">
                        <label>Waktu Realisasi</label>
                    </div>
                    <div class="form-group text-center col-6">
                        <div class="password">
                            <input type="date" class="form-control  w-100" name="field_waktu_realisasi" rows="1" placeholder="Pilih Tanggal"  required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group text-left col-6">
                        <label>Bukti Realisasi</label>
                    </div>
                    <div class="form-group text-left col-6">
                        <div class="password">
                            <input type="file"  accept=".png, .jpg"class="form-control  w-100" name="field_bukti_realisasi" required>
                            <?php if(isset($_FILES['field_bukti_realisasi'])): ?>
                                <p><?= $_FILES['field_bukti_realisasi']['name']; ?></p>
                            <?php endif; ?>
                            <!--<strong>
                                Ukuran File Maks : 200kb
                            </strong>-->
                        </div>
                    </div>
                </div>



            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" style="border:none;" data-dismiss="modal">Batal</button>
                <button type="submit" id="btn-simpan-assign" class="btn btn-primary tombol" style="background-color: #3c4b64; border:none;"><i class="fas fa-print mr-2"></i>Simpan</button>
            </div>
        </form>
    </div>
</div>
<!-- //MODAL REALISASI -->

<!-- MODAL ASSIGN -->
<div class="modal fade" id="modal-assign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('/saveAssignmentPekerjaan'); ?>" method="POST" class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Assign Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h5 id='judul-kerjaan-assign'><strong>Tes</strong></h5>
                        <input type="text" class="form-control" name="id_kerjaan" id="id-kerjaan-assign" class="form-control">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h5 id='target-kerjaan-assign'><strong>Target</strong></h5>
                    </div>
                </div>

                <?php if ($list_satker != NULL) : ?>
                    <?php for ($i = 2; $i < 13; $i++) { ?>
                        <div class="row">
                            <div class="form-group text-left col-6">
                                <label><?= $list_satker[$i]['kd_satker'] . '. ' . $list_satker[$i]['satker']; ?></label>
                            </div>
                            <div class="form-group text-center col-6">
                                <div class="password">
                                    <input type="number" class="form-control  w-100" id='<?= "field_target_" . $list_satker[$i]['kd_satker'] ?>' name='<?= "field_target_" . $list_satker[$i]['kd_satker'] ?>' min="0" value="0" required>
                                </div>
                            </div>
                        </div>
                    <?php }; ?>
                <?php endif; ?>

                <!-- tombol -->


                <!-- <div class="row ">
                    <div class="col-12 py-3 px-0">
                        <button id="tambah-assign" type="button" class="btn btn-default w-100 font-weight-bold">
                            <i class="fas fa-plus mr-2"></i>Tambah
                        </button>
                    </div>
                </div> -->

            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" style="border:none;" data-dismiss="modal">Batal</button>
                <button type="submit" id="btn-simpan-assign" class="btn btn-primary tombol" style="background-color: #3c4b64; border:none;"><i class="fas fa-print mr-2"></i>Simpan</button>
            </div>
        </form>
    </div>
</div>
<!-- //MODAL ASSIGN -->


<script>
    var pekerjaan = [];
    var pekerjaanValue = [];
    <?php if ($list_full_laporan_harian != null) : ?>
    <?php endif; ?>
    <?php if ($list_satuan != NULL) : ?>
        const satuan = [
            <?php foreach ($list_satuan as $satuan) : ?> "<?= $satuan['nama_satuan']; ?>",
            <?php endforeach; ?>
        ]
    <?php endif; ?>

    <?php if ($list_pekerjaan != NULL) : ?>
        pekerjaan = [
            <?php foreach ($list_pekerjaan as $pekerjaan) : ?> "<?= $pekerjaan['nmkerjaan']; ?>",
            <?php endforeach; ?>
        ]
        pekerjaanValue = [
            <?php foreach ($list_pekerjaan as $pekerjaan) : ?> "<?= $pekerjaan['id']; ?>",
            <?php endforeach; ?>
        ]   
    <?php endif; ?>
    var currentDate = '<?php

                        use CodeIgniter\I18n\Time;

                        $myTime = Time::today('Asia/Jakarta');
                        echo $myTime->toLocalizedString('yyyy-MM-dd');
                        ?>';
</script>

<script src="<?= base_url('/plugins/dropzone/min/dropzone.min.js') ?>"></script>
<script src="<?= base_url('/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<script src="<?= base_url('/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
<script src="<?= base_url('/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('/plugins/toastr/toastr.min.js') ?>"></script>

<script src="<?= base_url('/js/append_pekerjaan.js') ?>"></script>
<script src="<?= base_url('/js/tanggal.js') ?>"></script>
<script src="<?= base_url('/js/laporan-pekerjaan.js') ?>"></script>

<?= $this->endSection(); ?>