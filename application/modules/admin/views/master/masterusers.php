<?php $this->load->view('header') ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master Users
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
            <li class="active">Master Users</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('alert') ?>
                <div class="box">
                    <div class="box-header">
                    </div>
                    <div class="box-body table-responsive">
                        <table style="font-size: 12px;" class="table table-bordered table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Fullname</th>
                                    <th>Username</th>
                                    <th>Division</th>
                                    <th>Department</th>
                                    <th>Job Position</th>
                                    <th>Level</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user->result() as $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->fullname ?></td>
                                        <td><?= $data->username ?></td>
                                        <td><?= $data->division_name ?></td>
                                        <td><?= $data->department_name ?></td>
                                        <td><?= $data->job_position ?></td>
                                        <td><?= $data->level_name ?></td>
                                        <td><?= $data->role_name ?></td>
                                        <td>
                                            <button onclick="loadModalEdit(this)" data-user-id="<?= $data->id ?>" class="btn btn-primary btn-xs">Edit</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="modalEdit"></div>
<?php $this->load->view('footer') ?>
<script>
    $('#table1').DataTable()

    function loadModalEdit(button) {
        let user_id = $(button).data('user-id')
        $('#modalEdit').load("<?= base_url('admin/master/modaledit') ?>", {
            user_id
        }, function() {
            $('#modal-edit-user').modal('show')
        })
    }
</script>