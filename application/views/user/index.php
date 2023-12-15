<!-- Content Wrapper. Contains page content -->
<div style="height: auto; min-height: 100%" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class=" content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-md-4">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?= $this->session->flashdata('message'); ?>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user['name']; ?></h3>
                            <p class="text-muted text-center"><?= $user['email']; ?></p>

                            <p class="text-muted text-center">Member since <?= date('d F Y', $user['date_created']); ?></p>
                            <!-- <small class="text-muted text-right">Member since <?= date('d F Y', $user['date_created']); ?></small> -->

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Koordinator</b> <a class="float-right">1</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Dukungan</b> <a class="float-right">543</a>
                                </li>
                            </ul>
                            <div class="card-body row">
                                <div class="col-md-6">
                                    <a href="<?= base_url('user/edit'); ?>" class="btn btn-primary btn-block"> <i class="fas fa-edit"></i><b> Edit Profile</b></a>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?= base_url("/home"); ?>" class="btn btn-danger btn-block"><i class="fas fa-sign-out-alt" aria-hidden="true"></i><b> Keluar</b></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
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