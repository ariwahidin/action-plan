<div class="modal fade" id="modal-issue-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Issue Detail</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        
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
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                <button onclick="trackingIssue(this)" data-issue-id="<?= $detail->row()->id ?>" type="button" class="btn btn-warning">Tracking</button>
                <!-- <button onclick="" type="button" class="btn btn-primary">Close Issue</button> -->
            </div>
        </div>
    </div>
</div>