<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 480px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark"> Event</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Event</li>
                    </ol> -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <?= $this->session->flashdata('message'); ?>


                        <div class="card-header">
                            <h3 class="card-title">User Login Control</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" align="center">

                                <thead class=" text-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Fullname</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Jabatan</th>
                                        <th class="text-center" scope="col">Access</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>

                                    <?php foreach ($menu as $m) : ?>

                                        <tr>
                                            <th class="" scope="row"><?= $i; ?>
                                            </th>
                                            <td><?= $m['name']; ?></td>
                                            <td><?= $m['username']; ?></td>
                                            <td><?= $m['role']; ?></td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" <?= ($m['is_active'] == 1) ? "checked='checked'" : ""; ?> data-active="<?= $m['is_active']; ?>" data-id="<?= $m['id']; ?>" data-user="<?= $m['username']; ?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>

                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.form-check-input').on('click', function() {
        const userId = $(this).data('id');
        const userName = $(this).data('user');
        const activeId = $(this).data('active');
        // console.log(userId);
        // console.log(activeId);
        $.ajax({
            url: "<?= base_url('home/changeaccess') ?>",
            type: 'post',
            data: {
                userId: userId,
                userName: userName,
                activeId: activeId
            },
            success: function() {
                // window.alert("sometext");

                document.location.href = "<?= base_url('home/index') ?>";
            }
        });
        // console.log(data);
    });
</script>