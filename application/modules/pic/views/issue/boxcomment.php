<?php if ($comment->num_rows() > 0) { ?>
    <?php foreach ($comment->result() as $data) { ?>
        <div class="box-comment">
            <div class="comment-text" style="margin-left: 0 !important;">
                <span class="username">
                    <?= ucwords(strtolower($data->fullname)) ?>
                    <span class="text-muted pull-right"><?= date('d/m/Y H:i', strtotime($data->created_at)) ?></span>
                </span>
                <?= ucfirst($data->desc) ?>
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