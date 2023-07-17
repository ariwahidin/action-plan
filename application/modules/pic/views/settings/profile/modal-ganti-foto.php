<div class="modal fade" id="modal-ganti-foto">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ganti foto profile</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Foto</label>
                    <input onchange="kompresGambar()" type="file" id="gambar" class="form-control" accept="image/*">
                    <input type="hidden" name="gambar-kompres" id="gambar-kompres" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="gantiFoto()" class="btn btn-primary pull-right">Save</button>
            </div>
        </div>
    </div>
</div>