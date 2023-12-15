<div class="login-box">
    <div class="login-logo">
        <!-- <img src="<?= base_url('assets/img/logoA.png') ?>" class="card-img"> -->
        <!-- <a href="../../index2.html"><b>Tembak Reaksi</b></a> -->
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?= $this->session->flashdata('message'); ?>
            <!-- <?= form_error('email', '<small class="text-danger pl-3" >', '</small>'); ?> -->
            <?= form_error('password', '<small class="text-danger pl-3" >', '</small>'); ?>

            <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                <div class="input-group mb-3">
                    <!-- <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>"> -->
                    <input type="text" class="form-control" id="email" name="email" placeholder="Username or Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>



            <p class="mb-1">
                <a class="small" href="<?= base_url('auth/forgotpassword') ?>">I forgot my password</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->