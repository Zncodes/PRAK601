<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="mt-5">
<h2>Register</h2>
<form action="/auth/store" method="post">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" name="username" id="username" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    <a href="/login" class="btn btn-link">Kembali</a>
</form>
</div>
<?= $this->endSection() ?>
