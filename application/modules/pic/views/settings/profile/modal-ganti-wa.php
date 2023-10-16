<div class="modal fade" id="modal-ganti-wa">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ganti Info Profile</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Whatsapp</label>
                    <input type="text" value="<?=  $cekprofile->whatsapp; ?>" class="form-control" id="in-wa">
                </div>
                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" value="<?=  $cekprofile->email; ?>" class="form-control" id="in-email">
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="gantiwa()" class="btn btn-primary pull-right">Save</button>
            </div>
        </div>
    </div>
</div>