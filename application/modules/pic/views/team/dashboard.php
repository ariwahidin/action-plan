<?php $this->load->view('header') ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Team Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Team</li>
            <li class="active">Team Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php foreach ($team->result() as $data) { ?>
                <div class="col-md-4">
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header bg-aqua-active">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= base_url() ?>upload/fotoprofil/<?= $data->user_image == null ? "red-user.jpg" : $data->user_image ?>" alt="User Avatar">
                            </div>
                            <h3 class="widget-user-username"><?= ucwords(strtolower($data->fullname)) ?></h3>
                            <h5 class="widget-user-desc"><?= ucwords($data->job_position) ?></h5>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="<?= base_url('team/issueopen/pic/' . $data->id) ?>">Open Issue <span class="pull-right badge bg-blue"><?= $data->count_request_issue ?></span></a></li>
                                <li><a href="<?= base_url('team/closedissue/pic/' . $data->id) ?>">Closed Issue <span class="pull-right badge bg-aqua"><?= $data->count_closed_issue ?></span></a></li>
                                <li><a href="#">User's Issue<span class="pull-right badge bg-green"><?= $data->count_users_open_issue ?></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</div>

<?php $this->load->view('footer') ?>