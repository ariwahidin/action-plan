<?php $this->load->view('header') ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Closed Issue
            <small>Data closed issue</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Issue</li>
            <li class="active">Issue Request</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php $this->load->view('alert') ?>
                <div class="box">
                    <div class="box-header">
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Code Issue</th>
                                    <th>Assign to Dept</th>
                                    <th>Assign to Pic</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Request Date</th>
                                    <th>Request By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($issuerequest->result() as $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->code_issue ?></td>
                                        <td><?= $data->assign_to_depart_name ?></td>
                                        <td><?= ucwords(strtolower($data->assign_to_pic_name)) ?></td>
                                        <td><?= $data->subject ?></td>
                                        <td><?= $data->status_name ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($data->created_at)) ?></td>
                                        <td><?= $data->created_by_name ?></td>
                                        <td>
                                            <button onclick="showIssueDetail(this)" data-issue-id="<?= $data->id ?>" class="btn btn-primary btn-xs">Detail</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modal-create-issue">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('issue/createissue') ?>" method="POST" enctype="multipart/form-data" id="formIssue">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Create new issue</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <b>Date : </b> <?= date('d/m/Y') ?> <br>
                            <b>User : </b> <?= ucfirst(strtolower($this->session->userdata('sd_fullname'))) ?> <br>
                            <b>Dept : </b> <?= getDeptPic($this->session->userdata('sd_user_id')) ?> <br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Assign to Dept</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" id="input_depart_name" class="form-control">
                                    <input type="hidden" name="input_depart_id" id="input_depart_id">
                                    <span class="input-group-btn">
                                        <button onclick="pilihDept()" type="button" class="btn btn-info btn-flat">Pilih</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Assign to Pic</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" id="input-pic-name" class="form-control">
                                    <input type="hidden" name="input-pic-id" id="input-pic-id">
                                    <span class="input-group-btn">
                                        <button onclick="pilihPic()" type="button" class="btn btn-info btn-flat">Pilih</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Subject</label>
                                <input type="text" maxlength="20" class="form-control" name="subject" id="subject" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="desc" id="desc" cols="20" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Image</label>
                                <input id="gambar" type="file" accept="image/*">
                                <input type="hidden" id="gambar_kompres" name="gambar_kompres" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button onclick="send()" type="button" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalDetail"></div>
<div id="modalImageIssue">
    <div class="modal fade" id="imageIssue" tabindex="-1" role="dialog" aria-labelledby="gambarModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; margin: 30px auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="" class="img-fluid" style="width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modalTracking"></div>
<div id="modalCommentImage"></div>


<div class="modal fade" id="modal-pilih-dept">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pilih Department</h4>
            </div>
            <div class="modal-body">
                <table style="font-size: 10px;" class="table table-bordered" id="tableDept">
                    <thead>
                        <tr>
                            <th style="max-width: 20px;">No.</th>
                            <th>Dept Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($department->result() as $data) { ?>
                            <tr>
                                <td style="max-width: 20px;"><?= $no++ ?></td>
                                <td>
                                    <?= $data->Department ?>
                                </td>
                                <td>
                                    <button onclick="pilihDeptId(this)" data-depart-name="<?= $data->Department ?>" data-depart-id="<?= $data->id ?>" class="btn btn-primary btn-xs">Pilih</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer') ?>
<div id="div-modal-pic"></div>

<script>
    $('#imageIssue').on('show.bs.modal', function(event) {
        var gambar = $(event.relatedTarget); // Tombol yang memicu modal
        var src = gambar.attr('src'); // Mendapatkan sumber gambar

        var modal = $(this);
        modal.find('.modal-body img').attr('src', src); // Mengatur sumber gambar pada modal
    });
</script>

<script>
    $(document).ready(function() {
        $('#tableDept').DataTable({
            "pageLength": 5
        })
        $('#table1').DataTable()
    })

    function showModalCreateIssue() {
        $('#modal-create-issue').modal('show')
    }

    function pilihDept() {
        $('#modal-pilih-dept').modal('show')
    }

    function pilihDeptId(button) {
        let dept_id = $(button).data('depart-id')
        let dept_name = $(button).data('depart-name')
        $('#input_depart_id').val(dept_id)
        $('#input_depart_name').val(dept_name)
        $('#input-pic-id').val("")
        $('#input-pic-name').val("")
        $('#modal-pilih-dept').modal('hide')
    }

    function pilihPic() {
        let depart_id = $('#input_depart_id').val().trim()
        if (depart_id == "") {
            Swal.fire(
                'Notice',
                'Pilih department terlebih dahulu',
                'warning'
            )
        } else {
            $('#div-modal-pic').load("<?= base_url('issue/pic/modalpic') ?>", {
                depart_id
            }, function() {
                $('#tablePic').DataTable({
                    "pageLength": 5
                })
                $('#modal-pilih-pic').modal('show')
            })
        }
    }

    function choosePic(button) {
        let picId = $(button).data('pic-id')
        let picName = $(button).data('pic-name')
        $('#input-pic-id').val(picId)
        $('#input-pic-name').val(picName)
        $('#modal-pilih-pic').modal('hide')
    }
</script>
<script>
    function send() {

        let picId = $('#input-pic-id').val().trim()
        let deptId = $('#input_depart_id').val().trim()
        let desc = $('#desc').val().trim()
        let subject = $('#subject').val().trim()
        if (deptId == "") {
            Swal.fire(
                'Notice',
                'Dept tidak boleh kosong',
                'warning'
            )
        } else if (picId == "") {
            Swal.fire(
                'Notice',
                'Pic tidak boleh kosong',
                'warning'
            )
        } else if (subject == "") {
            Swal.fire(
                'Notice',
                'Subject tidak boleh kosong',
                'warning'
            )
        } else if (desc == "") {
            Swal.fire(
                'Notice',
                'Description tidak boleh kosong',
                'warning'
            )
        } else {
            Swal.fire({
                icon: 'question',
                title: 'Yakin untuk submit?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    // Swal.fire('Saved!', '', 'success')
                    loadingShow()
                    compressAndSubmit()
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }

    }

    function compressAndSubmit() {
        var fileInput = document.getElementById('gambar');
        var file = fileInput.files[0];

        if (!file) {
            document.getElementById('formIssue').submit();
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
                    document.getElementById('gambar_kompres').value = compressedDataUrl;

                    // Submit form
                    document.getElementById('formIssue').submit();
                }
            }
            reader.readAsDataURL(file);
        }
    }

    function showIssueDetail(button) {
        let issue_id = $(button).data('issue-id')
        $('#modalDetail').load("<?= base_url('issuerequest/detailissue') ?>", {
            issue_id
        }, function() {
            $('#modal-issue-detail').modal('show')
        })
    }

    function trackingIssue(button) {
        let issue_id = $(button).data('issue-id')
        $('#modalTracking').load("<?= base_url('issue/trackingissue') ?>", {
            issue_id
        }, function() {
            $('#modal-tracking-issue').modal('show')
        })
    }

    function sendComment(button) {
        let issue_id = $(button).data('tracking-issue-id')
        let comment = $('#input-issue-comment').val()
        if (comment.trim() != "") {
            $.ajax({
                url: "<?= base_url('issue/sendcomment') ?>",
                data: {
                    issue_id: issue_id,
                    comment: comment
                },
                method: "POST",
                dataType: "JSON",
                success: function(response) {
                    if (response.success == true) {
                        $('#box-comment').load("<?= base_url('issue/loadcomment') ?>", {
                            issue_id
                        })
                        $('#input-issue-comment').val("")
                    }
                }
            })
        }
    }
</script>