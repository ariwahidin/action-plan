<div class="modal fade" id="modal-close-issue">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Close Issue</h4>
            </div>
            <div class="modal-body" style="max-height: 300px; overflow-y: auto;">
                <form action="<?=base_url('issue/closeissue')?>" method="POST" id="formCloseIssue">
                    <div class="form-group">
                        <label for="">Note</label>
                        <textarea class="form-control" name="note" id="note" cols="20" rows="5"></textarea>
                        <input type="hidden" name="issue_id" id="close-issue-id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="closeIssue(this)" data-issue-id="" type="button" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>