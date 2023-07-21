<div class="box-footer box-comments">
    <?php if ($comment->num_rows() > 0) { ?>
        <?php foreach ($comment->result() as $data) { ?>
            <div class="box-comment <?= $data->new_action > 0 ? 'bg-success' : '' ?> ">
                <img class="img-circle img-sm" src="<?= base_url() ?>upload/fotoprofil/<?= $data->image_profile == null ? "red-user.jpg" :  $data->image_profile ?>" alt="User Image">
                <div class="comment-text">
                    <span class="username">
                        <?= $data->fullname ?>
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
        <p>Tidak ada action</p>
    <?php } ?>
</div>