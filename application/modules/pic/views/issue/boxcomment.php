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