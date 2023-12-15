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
                        <div class="card-header bg-primary">
                            <!-- <h5 class="card-title">Monthly Recap Report</h5> -->
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="info-box mb-10 bg-warning">
                                    <form action="<?= base_url('user/changepassword'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="current_password">Current Password</label>
                                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
                                            <?= form_error('current_password', '<small class="text-danger pl-3" >', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password1">New Password</label>
                                            <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="New Password">
                                            <?= form_error('new_password1', '<small class="text-danger pl-3" >', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password2">Repeat Password</label>
                                            <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Repeat Password">
                                            <?= form_error('new_password2', '<small class="text-danger pl-3" >', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
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