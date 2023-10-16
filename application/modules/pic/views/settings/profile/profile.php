<?php $this->load->view('header') ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">User Profile</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?><?php if (!is_null($_SESSION['sd_image'])) { echo "upload/fotoprofil/" . $_SESSION['sd_image']; } else { echo "assets/dist/img/red-user.png" ; } ?>" alt="User profile picture">

                        <h3 class="profile-username text-center">
                            <?= ucwords(strtolower($_SESSION['sd_fullname'])) ?>
                        </h3>

                        <p class="text-muted text-center">NIP :
                            <?= $this->session->userdata('sd_username') ?>
                        </p>
                        <p class="text-muted text-center">
                            <?= ucwords($profile->row()->department_name) ?>
                        </p>
                        <button onclick="loadModalGantiwa(this)" class="btn btn-primary btn-block"><b>Ganti Info
                                Profile</b></button>
                        <button onclick="loadModalGantiFoto(this)" class="btn btn-primary btn-block"><b>Ganti foto
                                profile</b></button>
                        <button onclick="loadModalGantiPassword(this)" class="btn btn-primary btn-block"><b>Ganti
                                password</b></button>
                    </div>
                </div>

            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>
                                    <?= $issuerequest ?>
                                </h3>

                                <p>Issue Request</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-arrow-down-a"></i>
                            </div>
                            <a href="<?= base_url('issuerequest/issuein') ?>" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>
                                    <?= $closedissue ?>
                                </h3>

                                <p>Closed Issue</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-checkmark-circled"></i>
                            </div>
                            <a href="<?= base_url('issuerequest/closedissue') ?>" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>
                                    <?= $myissue ?>
                                </h3>

                                <p>My Issue</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-arrow-up-a"></i>
                            </div>
                            <a href="<?= base_url('issue/myissue') ?>" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal ganti foto profile -->
<?php $this->view('settings/profile/modal-ganti-foto') ?>
<!-- Modal ganti foto profile -->
<?php $this->view('settings/profile/modal-ganti-wa') ?>
<!-- Modal ganti password -->
<?php $this->view('settings/profile/modal-ganti-password') ?>

<?php $this->load->view('footer') ?>
<script>
    function loadModalGantiFoto(button) {
        $('#modal-ganti-foto').modal('show')
    }

    function loadModalGantiwa(button) {
        $('#modal-ganti-wa').modal('show')
    }

    function loadModalGantiPassword(button) {
        $('#modal-ganti-password').modal('show')
    }

    function kompresGambar() {
        var fileInput = document.getElementById('gambar');
        var file = fileInput.files[0];

        if (!file) {
            document.getElementById('gambar-kompres').value = ""
        } else {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = new Image();
                img.src = e.target.result;

                img.onload = function () {
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
                    document.getElementById('gambar-kompres').value = compressedDataUrl;

                    // Submit form
                    // document.getElementById('formCommentImage').submit();
                }
            }
            reader.readAsDataURL(file);

        }
    }

    function gantiFoto() {
        let foto = $('#gambar-kompres').val()
        if (foto.trim() != "") {
            $.ajax({
                url: "<?= base_url('settings/profile/gantifoto') ?>",
                method: "POST",
                data: {
                    gambar_kompres: foto
                },
                dataType: "JSON",
                success: function (response) {
                    if (response.success = true) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Foto profil berhasil diganti',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function () {
                            window.location.href = "<?= base_url('settings/profile') ?>"
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Gagal',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            })
        }
    }


    function gantiwa() {
        let wa = $('#in-wa').val()
        let email = $('#in-email').val()
        $.ajax({
            url: "<?= base_url('settings/profile/gantiwa') ?>",
            method: "POST",
            data: {
                wa: wa,
                email: email
            },
            dataType: "JSON",
            success: function (response) {
                if (response.success == true) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: "Data berhasil diganti",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        window.location.href = "<?= base_url('settings/profile') ?>"
                    })
                }
            }
        });

    }

    function gantiPassword() {
        let password = $('#password').val()
        let passwordConfirm = $('#password-confirm').val()
        if (password.trim() != "" && passwordConfirm.trim() != "") {
            if (password == passwordConfirm) {
                $.ajax({
                    url: "<?= base_url('settings/profile/gantipassword') ?>",
                    method: "POST",
                    data: {
                        password
                    },
                    dataType: "JSON",
                    success: function (response) {
                        if (response.success == true) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: "Password berhasil diganti",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                window.location.href = "<?= base_url('settings/profile') ?>"
                            })
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: "Gagal ganti password",
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }
                })
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: "Password tidak cocok",
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    }
</script>