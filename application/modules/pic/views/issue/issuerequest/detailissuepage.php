<?php $this->load->view('header') ?>
<style>
.rating { 
    border: none;
    float: unset;
    width: 200px;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 30px;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}


.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }

input, label {
  cursor: pointer;
}

input[type="submit"] {
  margin-top: 5px;
  background-color: #302d2b;
  color: white;
  border: none;
  border-radius: 5px;
  padding: 12px 30px;
}

input[type="submit"]:focus {
  outline: 0;
}

input[type="submit"]:active {
  transform: scale(0.98);
}

input[type="submit"]:disabled {
  background-color: #ddd;
  cursor: not-allowed;
}

.fa-heart {
  color: red;
  font-size: 30px;
  margin-bottom: 10px;
}

.fa-heart:before {
  content: "\f004";
  font-family: FontAwesome;
}
</style>
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Action
            <small>Data detail issue <?= $detail->row()->code_issue ?> </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Issue</li>
            <li class="">Action</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12">
                        <b>Created Date : </b> <?= date('d/m/Y', strtotime($detail->row()->created_at)) ?> <br>
                        <b>Assign to Dept : </b> <?= $detail->row()->assign_to_depart_name ?> <br>
                        <b>Assign to Pic : </b> <?= ucfirst(strtolower($detail->row()->assign_to_pic_name)) ?> <br>
                        <b>Status : </b> <?= $detail->row()->status_name ?> <br><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Subject</label>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                <?= $detail->row()->subject ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Description</label>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                <?= $detail->row()->desc ?>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Image</label>
                            <img class="img-responsive pad" style="max-width: 300px;" src="<?= base_url() ?>upload/img/<?= $detail->row()->image ?>" alt="Photo" data-toggle="modal" data-target="#imageIssue">
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-md-6">
                <!-- Box Comment -->
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="<?= base_url() ?>upload/fotoprofil/<?= $detail->row()->image_profile_created_by == null ? "red-user.jpg" :  $detail->row()->image_profile_created_by ?>" alt="User Image">
                            <span class="username"><?= ucfirst(strtolower($detail->row()->created_by_name)) ?></span>
                            <span class="description">Created <?= date('d/m/Y H:i', strtotime($detail->row()->created_at)) ?></span>
                        </div>
                        <!-- /.user-block -->
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                                <i class="fa fa-circle-o"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <img class="img-responsive pad" src="<?= base_url() ?>upload/img/<?= $detail->row()->image ?>" alt="Photo" data-toggle="modal" data-target="#commentGambar">
                        <div class="form-group">
                            <label for="">Subject</label>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                <?= $detail->row()->subject ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                <?= $detail->row()->desc ?>
                            </p>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <!-- /.box-footer -->
                    <div class="box-footer">
                        <?php if ($this->session->userdata('sd_user_id') == $detail->row()->created_by) { ?>
                            <?php if ($detail->row()->status_name != 'close') { ?>
                                <button onclick="showModalCloseIssue(this)" data-issue-id="<?= $detail->row()->id ?>" type="button" class="btn btn-success btn-sm pull-right">Close Issue</button>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <!-- Box Comment -->
                <div class="box box-widget">
                    <div class="box-header">
                        <b>Action</b>
                        <input type="hidden" id="total-comment" value="0">
                    </div>
                    <div id="box-comment" style="max-height: 300px; overflow-y: auto;">
                    </div>
                    <div class="box-footer">
                        <img class="img-responsive img-circle img-sm" src="<?= base_url() ?>upload/fotoprofil/<?= $_SESSION['sd_image'] == null ? "red-user.jpg" :  $_SESSION['sd_image'] ?>" alt="Alt Text">
                        <!-- .img-push is used to add margin to elements next to floating images -->
                        <div class="input-group input-group-sm">
                            <input type="text" id="comment" class="form-control" style="margin-left: 10px;">
                            <input type="hidden" id="comment_issue_id" value="<?= $this->uri->segment(3) ?>" class="form-control">
                            <span class="input-group-btn">
                                <button onclick="sendComment(this)" data-tracking-issue-id="<?= $this->uri->segment(3) ?>" type="button" class="btn btn-info btn-flat">Send</button>
                                <button onclick="getImage(this)" data-tracking-issue-id="<?= $this->uri->segment(3) ?>" type="button" class="btn btn-default btn-flat">Img</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div id="modalCommenImage">
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
                                        <button onclick="sendImage(this)" data-tracking-issue-id="<?= $this->uri->segment(3) ?>" type="button" class="btn btn-info btn-flat">Send</button>
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
</div>
<div id="modalImageIssue">
    <div class="modal fade" id="commentGambar" tabindex="-1" role="dialog" aria-labelledby="gambarModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; margin: 30px auto;">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="" class="img-fluid" style="width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-close-issue">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Close Issue</h4>
            </div>
            <div class="modal-body" style="max-height: 300px; overflow-y: auto;">
                <label for="">Penilaian</label>               
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="5 stars"></label>
                    <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="4.5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="4 stars"></label>
                    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="3.5 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="3 stars"></label>
                    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="2.5 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="2 stars"></label>
                    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="1.5 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="1 star"></label>
                    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="0.5 stars"></label>
                </fieldset>
                <form action="<?= base_url('issue/closeissue') ?>" method="POST" id="formCloseIssue">
                    <div class="form-group">
                        <label for="">Note</label>
                        <input type="hidden" class="bintang" name="bintang" value="0"/>
                        <textarea class="form-control" name="note" id="note" cols="20" rows="5"></textarea>
                        <input type="hidden" name="issue_id" id="close-issue-id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="closeIssue(this)" data-issue-id="" type="button" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer') ?>


<script>
    $('#commentGambar').on('show.bs.modal', function(event) {
        var gambar = $(event.relatedTarget); // Tombol yang memicu modal
        var src = gambar.attr('src'); // Mendapatkan sumber gambar

        var modal = $(this);
        modal.find('.modal-body img').attr('src', src); // Mengatur sumber gambar pada modal
    });
</script>
<script>
    $(document).ready(function() {
        loadComment()
        setTimeout(updateIsRead, 5000)
        setInterval(loadComment, 4000)
    })

    function loadComment() {
        $('#box-comment').load("<?= base_url('issuerequest/loadboxcomment/') . $this->uri->segment(3) ?>", {}, function() {
            // scrollToBottom()
        })
        setTimeout(updateIsRead, 1500);
    }

    function updateIsRead() {
        $.ajax({
            url: "<?= base_url('issue/updateisread') ?>",
            type: "POST",
            data: {
                issue_id: <?= $this->uri->segment(3) ?>
            },
            dataType: "JSON",
            success: function(response) {}
        })
    }

    function sendComment(button) {
        let issue_id = $(button).data('tracking-issue-id')
        let comment = $('#comment').val()
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
                        $('#box-comment').load("<?= base_url('issuerequest/loadboxcomment/') . $this->uri->segment(3) ?>", {}, function() {
                            scrollToBottom()
                        })
                        $('#comment').val("")
                    }
                }
            })
        }
    }

    // Fungsi untuk mengatur posisi scroll ke paling bawah
    function scrollToBottom() {
        const scrollContainer = document.getElementById('box-comment');
        scrollContainer.scrollTop = scrollContainer.scrollHeight;
    }

    function getImage(button) {
        $('#modal-comment-image').modal('show')
    }
</script>
<script>
    let handleChange = ()=>{
        const inputRatings = document.querySelectorAll('input[name="rating"]');
        inputRatings.forEach(input => {
            input.addEventListener('change', () => {
            const valueStars = document.querySelector('input[name="rating"]:checked').value;
            document.querySelector(".bintang").value = valueStars;
            document.querySelector(".bintang").setAttribute("value",valueStars);
            })
        })
    };

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
                        $('#box-comment').load("<?= base_url('issuerequest/loadboxcomment/') . $this->uri->segment(3) ?>")
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

    function showModalCloseIssue(button) {
        let issue_id = $(button).data('issue-id')
        $('#close-issue-id').val(issue_id)
        $('#modal-close-issue').modal('show');
        handleChange();

    }

    function closeIssue(button) {
        let formCloseIssue = $('#formCloseIssue')
        formCloseIssue.submit()
    }
</script>