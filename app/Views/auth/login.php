<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="mt-5">
<h2>Login</h2>
<?php if(session()->getFlashdata('msg')):?>
    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
<?php endif;?>
<form action="/auth/loginAuth" method="post">
    <div class="form-group">
        <label for="username">Username or Email:</label>
        <input type="text" class="form-control" name="identifier" id="identifier" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <a href="/register" class="btn btn-link">Buat akun</a>
</form>
</div>
<?= $this->endSection() ?>
