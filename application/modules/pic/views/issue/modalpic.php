<div class="modal fade" id="modal-pilih-pic">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Pic</h4>
            </div>
            <div class="modal-body">
                <table style="font-size: 12px;" class="table table-bordered" id="tablePic">
                    <thead>
                        <tr>
                            <th style="max-width: 20px;">No.</th>
                            <th>Pic Name</th>
                            <th>Job Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pic->result() as $data) { ?>
                            <tr>
                                <td style="max-width: 20px;"><?= $no++ ?></td>
                                <td>
                                    <?= ucwords(strtolower($data->fullname)) ?>
                                </td>
                                <td>
                                    <?= $data->job_position ?>
                                </td>
                                <td>
                                    <button onclick="choosePic(this)" data-pic-name="<?= ucwords(strtolower($data->fullname)) ?>" data-pic-id="<?= $data->id ?>" class="btn btn-primary btn-xs">Pilih</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>