<div class="box direct-chat direct-chat-primary">
    <div class="box-footer box-comments">
        <?php if ($comment->num_rows() > 0) { ?>
            <?php foreach ($comment->result() as $data) { ?>
                <!-- <div class="box-comment <?= $data->new_action > 0 ? 'bg-success' : '' ?> ">
                <img class="img-circle img-sm" src="<?= base_url() ?>upload/fotoprofil/<?= $data->image_profile == null ? "red-user.jpg" :  $data->image_profile ?>" alt="User Image">
                <div class="comment-text">
                    <span class="username">
                        <?= $data->fullname ?>
                        <span class="text-muted pull-right"><?= date('d/m/Y H:i', strtotime($data->created_at)) ?>
                            <?php if ($data->is_read == 'n') { ?>
                                <i class="ion ion-android-done"></i>
                            <?php } else { ?>
                                <i class="ion ion-android-done-all"></i>
                            <?php } ?>
                        </span>
                    </span>
                    <?php if (!is_null($data->image)) { ?>
                        <img class="attachment-img" style="min-width: 100px; min-height: 60px; margin-right: 5px;" src="<?= base_url() ?>upload/commentimg/<?= $data->image ?>" alt="Attachment Image" data-toggle="modal" data-target="#commentGambar">
                        <div class="attachment-pushed">
                            <div class="attachment-text">
                                <?= ucfirst($data->desc) ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <?= ucfirst($data->desc) ?>
                    <?php } ?>
                </div>
            </div> -->
                <!-- <div class="direct-chat-messages"> -->
                <?php if ($this->session->userdata('sd_user_id') != $data->created_by) { ?>
                    <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left"><?= $data->fullname ?></span>
                            <span class="direct-chat-timestamp">&nbsp; <?= date('d/m/Y H:i', strtotime($data->created_at)) ?></span>
                        </div>
                        <img class="direct-chat-img" src="<?= base_url() ?>upload/fotoprofil/<?= $data->image_profile == null ? "red-user.jpg" :  $data->image_profile ?>" alt="Message User Image"><!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            <?php if (!is_null($data->image)) { ?>
                                <img class="attachment-img" style="max-width: 70px; margin-right: 5px;" src="<?= base_url() ?>upload/commentimg/<?= $data->image ?>" alt="Attachment Image" data-toggle="modal" data-target="#commentGambar">
                                <div class="attachment-pushed">
                                    <div class="attachment-text">
                                        <?= ucfirst($data->desc) ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <?= ucfirst($data->desc) ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-timestamp pull-right"> &nbsp; <?= date('d/m/Y H:i', strtotime($data->created_at)) ?>
                                <?php if ($data->is_read == 'n') { ?>
                                    <i class="ion ion-android-done"></i>
                                <?php } else { ?>
                                    <i class="ion ion-android-done-all"></i>
                                <?php } ?>
                            </span>
                            <span class="direct-chat-name pull-right"><?= $data->fullname ?></span>
                        </div>
                        <img class="direct-chat-img" src="<?= base_url() ?>upload/fotoprofil/<?= $data->image_profile == null ? "red-user.jpg" :  $data->image_profile ?>" alt="Message User Image"><!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            <?php if (!is_null($data->image)) { ?>
                                <img class="attachment-img" style="max-width: 70px; margin-right: 5px;" src="<?= base_url() ?>upload/commentimg/<?= $data->image ?>" alt="Attachment Image" data-toggle="modal" data-target="#commentGambar">
                                <div class="attachment-pushed">
                                    <div class="attachment-text">
                                        <?= ucfirst($data->desc) ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <?= ucfirst($data->desc) ?>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <!-- </div> -->
            <?php } ?>
        <?php } else { ?>
            <p>Tidak ada action</p>
        <?php } ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        let old_total_comment = $('#total-comment').val();
        let new_total_comment = "<?= $comment->num_rows() ?>";
        // console.log(old_total_comment)
        // console.log(new_total_comment)
        if (new_total_comment > old_total_comment) {
            scrollToBottom()
            $('#total-comment').val(new_total_comment)
        }
    })
</script>