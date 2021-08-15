<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container ms-0 me-0 mt-0 mb-0 login">
    <div class="col align-self-center">
        <div class="row">
            <div class="col-md-6 align-self-center login-image">
                <div><img class="login" src="/img/19199015.png" alt=""></div>
            </div>
            <div class="col-md-6 align-self-center form-login">
                <h1 class="judul-login mb-0">Sistem Penomoran<br>Surat</h1>
                <div class="d-flex align-items-center justify-content-center mt-0">
                    <form class="login" id="login" action="<?= base_url('/login'); ?>" method="post">
                        <div class="form-group mt-4">
                            <!-- <label for="user_id">User ID</label> -->
                            <input type="text" class="form-control mt-1 login user" name="user_id" id="user_id" placeholder="Masukkan User ID">
                        </div>
                        <div class="form-group mt-4">
                            <!-- <label for="password">Password</label> -->
                            <input type="password" class="form-control mt-1 login pass" name="password" id="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 login">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>