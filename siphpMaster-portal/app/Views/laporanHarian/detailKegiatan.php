<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('/listLaporan') ?>">Daftar Laporan</a></li>
                        <li class="breadcrumb-item active">Detail Kegiatan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 d-flex flex-column justify-content-center align-items-center" style="max-height: 300px;">
                                    <i class="far fa-check-circle text-success" style="font-size: 150px;"></i>
                                    <span class="text-success mb-5" style="font-size: 40px;">Selesai</span>
                                </div>
                                <div class="col-md-8 border-left px-3">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <h1>Judul Kegiatan</h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <strong>Tanggal</strong>
                                            <p class="mt-2 py-1">28/6/2022</p>
                                        </div>
                                        <div class="col-6">
                                            <div class="float-right">
                                                <strong class="">Waktu Pengerjaan</strong>
                                                <div class="mt-2">
                                                    <span class="badge badge-secondary py-1 px-3 mr-2">07:30</span> s/d <span class="badge badge-secondary py-1 px-3 ml-2">09:00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <strong>Uraian Kegiatan</strong>
                                    <p class="mt-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum cupiditate esse qui porro recusandae quia. Vero fugit harum vel saepe nulla itaque quibusdam debitis, culpa earum in numquam distinctio quod voluptatem quidem animi temporibus eligendi sed dicta voluptatibus ullam laborum! Minus illum natus quasi aperiam fuga cupiditate beatae, quidem voluptatibus!</p>

                                    <strong>Hasil Kegiatan</strong>
                                    <p class="mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cumque aliquid aliquam perspiciatis adipisci illo voluptates optio error, corporis neque repellat inventore ipsam commodi? Ducimus itaque saepe nobis quos corrupti dolores neque praesentium nam voluptatum necessitatibus, atque cum, iure maiores.</p>

                                    <strong>Bukti Dukung</strong>
                                    <p class="mt-1">
                                    <ul>
                                        <li><a href="">https://translate.google.com/?sl=id&tl=en&op=translate</a></li>
                                        <li><a href="">https://translate.google.com/?sl=id&tl=en&op=translate</a></li>
                                    </ul>
                                    </p>
                                    <div class="row">
                                        <div class="col-8"></div>
                                        <div class="col-4 float-right">
                                            <div class="float-right">
                                                <a href="" class="btn tombol px-4" style="color: white; background-color: #3c4b64;">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>