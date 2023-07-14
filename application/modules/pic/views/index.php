<?php $this->view('header') ?>

<div class="content-wrapper">
    <section class="content">
        Ini Halaman Pic
        <?php var_dump($this->session->userdata()) ?>
    </section>
</div>

<?php $this->view('footer') ?>