<?php $this->load->view('header') ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Detail Issue
            <small>Data closed issue</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Issue</li>
            <li class="active">Issue Request</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12">
                        <b>Created Date : </b> <?= date('d/m/Y', strtotime($detail->row()->created_at)) ?> <br>
                        <b>Assign to Dept : </b> <?= $detail->row()->assign_to_depart_name ?> <br>
                        <b>Assign to Pic : </b> <?= ucfirst(strtolower($detail->row()->assign_to_pic_name)) ?> <br>
                        <b>Status : </b> <?= $detail->row()->status_name ?> <br><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Subject</label>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                <?= $detail->row()->subject ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                <?= $detail->row()->desc ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Image</label>
                            <img class="img-responsive pad" style="max-width: 300px;" src="<?= base_url() ?>upload/img/<?= $detail->row()->image ?>" alt="Photo" data-toggle="modal" data-target="#imageIssue">
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-md-6">
                <!-- Box Comment -->
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="<?= base_url('assets') ?>/dist/img/user1-128x128.jpg" alt="User Image">
                            <span class="username"><?= ucfirst(strtolower($detail->row()->created_by_name)) ?></span>
                            <span class="description"><?= date('d/m/Y', strtotime($detail->row()->created_at)) ?></span>
                        </div>
                        <!-- /.user-block -->
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                                <i class="fa fa-circle-o"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <img class="img-responsive pad" src="<?= base_url() ?>upload/img/<?= $detail->row()->image ?>" alt="Photo">
                        <div class="form-group">
                            <label for="">Subject</label>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                <?= $detail->row()->subject ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                <?= $detail->row()->desc ?>
                            </p>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <!-- /.box-footer -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <!-- Box Comment -->
                <div class="box box-widget">

                    <div class="box-footer box-comments">
            
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="<?= base_url('assets') ?>/dist/img/user3-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                                <span class="username">
                                    Maria Gonzales
                                    <span class="text-muted pull-right">8:03 PM Today</span>
                                </span><!-- /.username -->
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="<?= base_url('assets') ?>/dist/img/user5-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                                <span class="username">
                                    Nora Havisham
                                    <span class="text-muted pull-right">8:03 PM Today</span>
                                </span><!-- /.username -->
                                The point of using Lorem Ipsum is that it has a more-or-less
                                normal distribution of letters, as opposed to using
                                'Content here, content here', making it look like readable English.
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                    </div>
                    <!-- /.box-footer -->
                    <div class="box-footer">
                        <form action="#" method="post">
                            <img class="img-responsive img-circle img-sm" src="<?= base_url('assets') ?>/dist/img/user4-128x128.jpg" alt="Alt Text">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                                <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                            </div>
                        </form>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('footer') ?>