<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div><!-- /.col -->
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div>/.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <h5 class="card-title">Monthly Recap Report</h5> -->
                            <!-- notif error -->
                            <!-- <?= form_error('vjp', '<div class="alert alert-danger" role ="alert">', '</div>'); ?> -->
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>
                            <!-- notif sukses -->
                            <?= $this->session->flashdata('message'); ?>
                            <!--  -->
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" align="center">
                                <thead class="text-center text-dark">
                                    <tr>
                                        <TH>#</th>
                                        <TH>NIK</th>
                                        <TH>Nama</th>
                                        <TH>Alamat</th>
                                        <TH>Kelurahan</th>
                                        <TH>Kecamatan</th>
                                        <TH>RT</th>
                                        <TH>RW</th>
                                        <TH>TPS</th>
                                        <TH>No Telpon</th>
                                        <TH>Foto KTP</th>
                                        <TH>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>

                                    <?php foreach ($kec as $m) : ?>

                                        <tr>
                                            <th class="text-center" scope="row"><?= $i; ?>
                                            </th>
                                            <td><?= $m['noktp']; ?></td>
                                            <td><?= $m['nama']; ?></td>
                                            <td style="width: 200px"><?= $m['alamat']; ?></td>
                                            <td><?= $m['namakel']; ?></td>
                                            <td><?= $m['namakec']; ?></td>
                                            <td><?= $m['rt']; ?></td>
                                            <td><?= $m['rw']; ?></td>
                                            <td><?= $m['tps']; ?></td>
                                            <td><?= $m['nohp']; ?></td>
                                            <td style="width: 150px">
                                                <a href="<?= base_url('assets/img/dtdc/') . $m['image']; ?>" class="portfolio-popup">
                                                    <img src="<?= base_url('assets/img/dtdc/') . $m['image']; ?> " class="img-thumbnail" />
                                                </a>
                                            </td>
                                            <td class="text-center" style="width: 120px">
                                                <a data-toggle="modal" data-target="#edit<?= $m['id']; ?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-fw fa-edit" aria-hidden="true"></i></a>
                                                <!-- <a data-toggle="modal" data-target="#edit<?= $m['id']; ?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil"></i></a> -->
                                                <!-- <a href="" class="badge badge-danger">delete</a> -->
                                                <a href="<?= site_url('details/delete/' . $m['id'] . '/' . $m['image']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $m['nama']; ?> ?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>

                                        <!-- Modal Edit Verifikasi -->
                                        <div class="modal fade" id="edit<?= $m['id']; ?>" tabindex="-1" aria-labelledby="editVerifikasiModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editVerifikasiModalLabel">Edit Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('details/edit/') . $m['id']; ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="hidden" readonly value="<?= $m['id']; ?>" name="id" class="form-control">
                                                            <!-- <input readonly value="<?= $m['image']; ?>" name="id" class="form-control"> -->
                                                            <div class="form-group row">
                                                                <label for="noktp" class="col-sm-3 col-form-label">NIK</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" disabled class="form-control" id="noktp" name="noktp" value="<?= $m['noktp']; ?>" placeholder="NIK">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                                <div class="col-sm-9">
                                                                    <input disabled type="text" class="form-control" id="nama" name="nama" value="<?= $m['nama']; ?>" placeholder="Nama">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                                <div class="col-sm-9">
                                                                    <textarea disabled class="form-control" rows="3" id="alamat" name="alamat" placeholder="Alamat ..."><?= $m['alamat']; ?> RT. <?= $m['rt']; ?> RW. <?= $m['rt']; ?> KEL. <?= $m['namakel']; ?> KEC. <?= $m['namakec']; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <!--  -->
                                                            <div class="form-group row">
                                                                <label for="tps" class="col-sm-3 col-form-label">TPS</label>
                                                                <div class="col-sm-9">
                                                                    <input disabled type="text" class="form-control" id="tps" name="tps" value="<?= $m['tps']; ?>" placeholder="rw">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                            </div>
                                                            <div class="form-group row">
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="nohp" class="col-sm-3 col-form-label">No Telpon</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $m['nohp']; ?>" placeholder="No Telpon">
                                                                    <input type="hidden" class="form-control" id="oldimage" name="oldimage" value="<?= $m['image']; ?>" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-2">Picture</div>
                                                                <div class="col-sm-10">
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <span class="info-box-icon bg-warning elevation-1">
                                                                                <img src="<?= base_url('assets/img/dtdc/') . $m['image']; ?> " class="img-thumbnail" />
                                                                            </span>
                                                                        </div>
                                                                        <div class="col-sm-9">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="image" name="image" placeholder="" />
                                                                                <label class="custom-file-label" for="image">Choose file (Max 8MB)</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Edit verifikasi -->

                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.info-box-content -->

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->