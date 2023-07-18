<?php $this->load->view('header') ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Closed Issue
            <small>Data closed issue di team anda</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Team</li>
            <li class="active">Closed Issue</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('alert') ?>
                <div class="box">
                    <div class="box-header">
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Code Issue</th>
                                    <th>Assign to Dept</th>
                                    <th>Assign to Pic</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Request Date</th>
                                    <th>Request By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($issue->result() as $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->code_issue ?></td>
                                        <td><?= $data->assign_to_depart_name ?></td>
                                        <td><?= ucwords(strtolower($data->assign_to_pic_name)) ?></td>
                                        <td><?= $data->subject ?></td>
                                        <td><?= $data->status_name ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($data->created_at)) ?></td>
                                        <td><?= ucwords(strtolower($data->created_by_name)) ?></td>
                                        <td>
                                            <button onclick="showIssueDetail(this)" data-issue-id="<?= $data->id ?>" class="btn btn-primary btn-xs">Detail</button>
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
<div id="modalDetail"></div>
<div id="modalTrackingIssue"></div>

<?php $this->load->view('footer') ?>
<script>
    $('#table1').DataTable()

    function showIssueDetail(button) {
        let issue_id = $(button).data('issue-id')
        $('#modalDetail').load("<?= base_url('team/issuerequest/detail') ?>", {
            issue_id
        }, function() {
            $('#modal-issue-detail').modal('show')
        })
    }

    function modalTrackingIssue(button) {
        let issue_id = $(button).data('issue-id')
        $('#modalTrackingIssue').load("<?= base_url('team/issuerequest/trackingissue') ?>", {
            issue_id
        }, function() {
            $('#modal-tracking-issue').modal('show')
        })
    }
</script>