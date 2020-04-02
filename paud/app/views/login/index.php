<div class="container">
    <form action="<?= BASEURL;?>/login/verifikasi_akun" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control username" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control password" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-secondary">Login</button>
    </form>
</div>