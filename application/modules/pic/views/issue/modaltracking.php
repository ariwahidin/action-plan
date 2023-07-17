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
                <?php if ($issue->row()->status_name != 'close') { ?>
                    <div class="box-footer">
                        <div class="input-group input-group-sm">
                            <input type="text" id="input-issue-comment" class="form-control">
                            <input type="hidden" id="comment_issue_id" value="<?= $issue_id ?>" class="form-control">
                            <span class="input-group-btn">
                                <button onclick="sendComment(this)" data-tracking-issue-id="<?= $issue_id ?>" type="button" class="btn btn-info btn-flat">Send</button>
                                <button onclick="getImage(this)" data-tracking-issue-id="<?= $issue_id ?>" type="button" class="btn btn-default btn-flat">Img</button>
                            </span>
                        </div>
                    </div>
                <?php } ?>
                <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                <!-- <button onclick="" type="button" class="btn btn-primary">Close Issue</button> -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="commentGambar" tabindex="-1" role="dialog" aria-labelledby="gambarModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 90%; margin: 30px auto;">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" class="img-fluid" style="width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>

<script>
    var ajaxInterval
    $('#modal-tracking-issue').on('shown.bs.modal', function() {
        let issue_id = $('#comment_issue_id').val().trim()
        ajaxInterval = setInterval(function() {
            $('#box-comment').load("<?= base_url('issue/loadcomment') ?>", {
                issue_id
            })
        }, 1000)
    })
    $('#modal-tracking-issue').on('hidden.bs.modal', function() {
        // Hentikan interval pemanggilan AJAX
        clearInterval(ajaxInterval);
    });
</script>
<script>
    function getImage(button) {
        let issue_id = $(button).data('tracking-issue-id')
        $('#modalCommentImage').load("<?= base_url('issuerequest/loadmodalcommentimage') ?>", {
            issue_id
        }, function() {
            $('#modal-comment-image').modal('show')
        })
    }
</script>
<script>
    $('#commentGambar').on('show.bs.modal', function(event) {
        var gambar = $(event.relatedTarget); // Tombol yang memicu modal
        var src = gambar.attr('src'); // Mendapatkan sumber gambar

        var modal = $(this);
        modal.find('.modal-body img').attr('src', src); // Mengatur sumber gambar pada modal
    });
</script>