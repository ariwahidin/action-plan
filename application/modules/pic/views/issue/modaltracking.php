<div class="modal fade" id="modal-tracking-issue">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tracking Issue</h4>
            </div>
            <div class="modal-body" style="max-height: 300px; overflow-y: auto;">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Box Comment -->
                        <div class="box box-widget">
                            <div class="box-footer box-comments box-responsive" id="box-comment">
                                <?php $this->load->view('issue/boxcomment') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="box-footer">
                    <div class="input-group input-group-sm">
                        <input type="text" id="input-issue-comment" class="form-control">
                        <span class="input-group-btn">
                            <button onclick="sendComment(this)" data-tracking-issue-id="<?= $issue_id ?>" type="button" class="btn btn-info btn-flat">Send</button>
                        </span>
                    </div>
                </div>
                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                <!-- <button onclick="" type="button" class="btn btn-primary">Close Issue</button> -->
            </div>
        </div>
    </div>
</div>