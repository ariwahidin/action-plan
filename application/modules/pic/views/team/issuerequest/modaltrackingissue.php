<div class="modal fade" id="modal-tracking-issue">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Action History</h4>
            </div>
            <div class="modal-body" style="max-height: 300px; overflow-y: auto;">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Box Comment -->
                        <div class="box box-widget">
                            <div class="box-footer box-comments box-responsive" id="box-comment">
                                <?php if ($comment->num_rows() > 0) { ?>
                                    <?php foreach ($comment->result() as $data) { ?>
                                        <div class="box-comment">
                                            <div class="comment-text" style="margin-left: 0 !important;">
                                                <span class="username">
                                                    <?= ucwords(strtolower($data->fullname)) ?>
                                                    <span class="text-muted pull-right"><?= date('d/m/Y H:i', strtotime($data->created_at)) ?></span>
                                                </span>

                                                <?php if (!is_null($data->image)) { ?>
                                                    <!-- <div class="attachment-block clearfix"> -->
                                                    <img class="attachment-img" style="min-width: 100px; min-height: 60px; margin-right: 5px;" src="<?= base_url() ?>upload/commentimg/<?= $data->image ?>" alt="Attachment Image" data-toggle="modal" data-target="#commentGambar">
                                                    <div class="attachment-pushed">
                                                        <div class="attachment-text">
                                                            <?= ucfirst($data->desc) ?>
                                                        </div>
                                                    </div>
                                                    <!-- </div> -->
                                                <?php } else { ?>
                                                    <?= ucfirst($data->desc) ?>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="box-comment">
                                        <div class="comment-text" style="margin-left: 0 !important;">
                                            Tidak ada data
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
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