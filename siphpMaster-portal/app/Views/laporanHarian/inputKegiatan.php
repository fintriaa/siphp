<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Input Kegiatan</li>
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
                    <div class="card card-primary py-5 px-3">
                        <form action="<?= base_url('/saveLaporanHarian') ?>" method="POST" class="card-body box-profile">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="float-left">
                                        <label for="tgl_kegiatan">Judul Kegiatan</label>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="judul_kegiatan" placeholder="Judul Kegiatan ..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="float-left">
                                        <label for="tgl_kegiatan">Tanggal</label>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="tgl_kegiatan" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="float-left">
                                        <label>Waktu Kegiatan</label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <!-- time Picker -->
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                <div class="input-group-prepend">
                                                    <span class="btn" style="background-color: #3c4b64; color: white;">Mulai</span>
                                                </div>
                                                <input type="text" name="waktu_mulai" class="form-control datetimepicker-input" data-target="#timepicker" />
                                                <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="far fa-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <!-- time Picker -->
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                                <div class="input-group-prepend">
                                                    <span class="btn" style="background-color: #3c4b64; color: white;">Selesai</span>
                                                </div>
                                                <input type="text" name="waktu_selesai" class="form-control datetimepicker-input" data-target="#timepicker2" />
                                                <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="far fa-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="float-left">
                                        <label for="uraian_kegiatan">Uraian Kegiatan</label>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <textarea class="form-control" name="uraian_kegiatan" rows="3" placeholder="Masukkan Uraian Kegiatan ..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="float-left">
                                        <label for="target">Target</label>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <select name="kd_target" class="form-control">
                                            <option value="" selected disabled>- Pilih Target -</option>
                                            <?php foreach ($list_target as $list) : ?>
                                                <option value="<?= $list['id']; ?>"><?= $list['nama_target']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="float-left">
                                        <label for="hasil_kegiatan">Hasil Kegiatan</label>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <textarea class="form-control" name="hasil_kegiatan" rows="3" placeholder="Masukkan Hasil Kegiatan ..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="float-left">
                                        <label for="bukti_dukung">Bukti Dukung</label>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <textarea name="bukti_dukung" id="summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="float-left">
                                        <label>Status</label>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <!-- select -->
                                    <div class="form-group">
                                        <select name="status" class="form-control">
                                            <option value="S">Selesai</option>
                                            <option value="P">Proses</option>
                                            <option value="B">Belum</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="float-right ">
                                        <button type="reset" class="btn btn-danger mr-2">Batal</button>
                                        <button type="submit" class="btn tombol" style="color: white; background-color: #3c4b64;">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('plugins/summernote/summernote-bs4.min.js') ?>"></script>

<script>
    $(function() {
        // Summernote
        $("#summernote").summernote({
            placeholder: 'Link/list bukti kegiatan',
            height: 120,
            style: false,
            toolbar: [
                ['para', ['ul', 'ol']],
                ['insert', ['link', 'file']],
            ]
        });
    });
</script>

<?= $this->endSection(); ?>