<div class="modal fade" id="modal-comment-image">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Choose Image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= base_url('issuerequest/createcommentimage') ?>" method="POST" id="formCommentImage">
                            <div class="form-group">
                                <label for="">Image</label>
                                <input onchange="compress()" type="file" class="form-control" accept="image/*" id="comment_gambar">
                                <input type="hidden" class="form-control" name="comment_gambar_kompres" id="comment_gambar_kompres">
                            </div>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" name="comment_image_desc" id="comment_image_desc" placeholder="Description">
                                <span class="input-group-btn">
                                    <button onclick="sendImage(this)" data-tracking-issue-id="<?= $issue_id ?>" type="button" class="btn btn-info btn-flat">Send</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function sendImage(button) {
        var issue_id = $(button).data('tracking-issue-id')
        let gambar_kompres = document.getElementById('comment_gambar_kompres').value
        let gambar_desc = document.getElementById('comment_image_desc').value

        if (gambar_kompres == "" || gambar_desc == "") {

        } else {
            // console.log('ajaxxx')
            $.ajax({
                url: "<?= base_url('issuerequest/createcommentimage') ?>",
                data: {
                    issue_id: issue_id,
                    gambar_kompres: gambar_kompres,
                    gambar_desc: gambar_desc
                },
                method: "POST",
                dataType: "JSON",
                success: function(response) {
                    if (response.success == true) {
                        $('#modal-comment-image').modal('hide')
                    }
                },
            })
        }
    }

    function compress() {
        var fileInput = document.getElementById('comment_gambar');
        var file = fileInput.files[0];

        if (!file) {
            // document.getElementById('formCommentImage').submit();
            document.getElementById('comment_gambar_kompres').value = ""
        } else {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = new Image();
                img.src = e.target.result;

                img.onload = function() {
                    var canvas = document.createElement('canvas');
                    var ctx = canvas.getContext('2d');

                    // Mengatur ukuran canvas sesuai kebutuhan
                    var maxWidth = 800;
                    var maxHeight = 600;
                    var width = img.width;
                    var height = img.height;

                    if (width > height) {
                        if (width > maxWidth) {
                            height *= maxWidth / width;
                            width = maxWidth;
                        }
                    } else {
                        if (height > maxHeight) {
                            width *= maxHeight / height;
                            height = maxHeight;
                        }
                    }

                    canvas.width = width;
                    canvas.height = height;

                    // Menggambar gambar pada canvas dengan ukuran yang sudah ditentukan
                    ctx.drawImage(img, 0, 0, width, height);

                    // Mengompres gambar menjadi base64
                    var compressedDataUrl = canvas.toDataURL('image/jpeg', 0.7); // Menggunakan format JPEG dengan kualitas 0.7

                    // Menambahkan data gambar yang sudah dikompres ke input tersembunyi sebelum submit
                    document.getElementById('comment_gambar_kompres').value = compressedDataUrl;

                    // Submit form
                    // document.getElementById('formCommentImage').submit();
                }
            }
            reader.readAsDataURL(file);

        }
    }

    // function compressAndSubmitCommentImage() {
    //     var fileInput = document.getElementById('comment_gambar');
    //     var file = fileInput.files[0];
    //     var comment_image = document.getElementById('comment_image_desc').value;

    //     if (!file || comment_image.trim() == "") {
    //         // document.getElementById('formCommentImage').submit();
    //     } else {
    //         var reader = new FileReader();
    //         reader.onload = function(e) {
    //             var img = new Image();
    //             img.src = e.target.result;

    //             img.onload = function() {
    //                 var canvas = document.createElement('canvas');
    //                 var ctx = canvas.getContext('2d');

    //                 // Mengatur ukuran canvas sesuai kebutuhan
    //                 var maxWidth = 800;
    //                 var maxHeight = 600;
    //                 var width = img.width;
    //                 var height = img.height;

    //                 if (width > height) {
    //                     if (width > maxWidth) {
    //                         height *= maxWidth / width;
    //                         width = maxWidth;
    //                     }
    //                 } else {
    //                     if (height > maxHeight) {
    //                         width *= maxHeight / height;
    //                         height = maxHeight;
    //                     }
    //                 }

    //                 canvas.width = width;
    //                 canvas.height = height;

    //                 // Menggambar gambar pada canvas dengan ukuran yang sudah ditentukan
    //                 ctx.drawImage(img, 0, 0, width, height);

    //                 // Mengompres gambar menjadi base64
    //                 var compressedDataUrl = canvas.toDataURL('image/jpeg', 0.7); // Menggunakan format JPEG dengan kualitas 0.7

    //                 // Menambahkan data gambar yang sudah dikompres ke input tersembunyi sebelum submit
    //                 document.getElementById('comment_gambar_kompres').value = compressedDataUrl;

    //                 // Submit form
    //                 // var gambar_kompres = document.getElementById('comment_gambar_kompres').value = compressedDataUrl;
    //                 // var gambar_desc = document.getElementById('comment_image_desc')
    //                 // console.log(JSON.stringify(gambar_kompres))
    //                 // $.ajax({
    //                 //     url: "<?= base_url('issuerequest/createcommentimage') ?>",
    //                 //     data: {
    //                 //         gambar_kompres: JSON.stringify(gambar_kompres),
    //                 //         gambar_desc: gambar_desc
    //                 //     },
    //                 //     method: "POST",
    //                 //     dataType: "JSON",
    //                 //     success: function(response) {

    //                 //     },
    //                 // })
    //                 // document.getElementById('formCommentImage').submit();
    //             }
    //         }
    //         reader.readAsDataURL(file);
    //         console.log(JSON.stringify(document.getElementById('comment_gambar_kompres').value))
    //     }
    // }
</script>

