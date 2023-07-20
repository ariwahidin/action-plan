<div class="modal fade" id="modal-edit-user">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit User Access</h4>
            </div>
            <form action="<?=base_url('admin/master/editaccessuser')?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Fullname</label>
                        <input type="text" class="form-control" value="<?= $usr->row()->fullname ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="hidden" name="user_id" value="<?= $usr->row()->id ?>">
                        <input type="text" name="username" class="form-control" value="<?= $usr->row()->username ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php foreach ($level->result() as $data) { ?>
                                <option value="<?= $data->id ?>" <?= $data->level_name == $usr->row()->level_name ? 'selected' : '' ?>><?= $data->level_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php foreach ($role->result() as $data) { ?>
                                <option value="<?= $data->id ?>" <?= $data->role_name == $usr->row()->role_name ? 'selected' : '' ?>><?= $data->role_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>