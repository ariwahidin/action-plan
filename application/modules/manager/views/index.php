<?php $this->view('header') ?>

<div class="content-wrapper">
    <section class="content">
        Ini Halaman Manager
        <?php var_dump($this->session->userdata()) ?>
    </section>
</div>

<?php $this->view('footer') ?>