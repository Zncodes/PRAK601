<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="mt-5">
<h2>Edit Buku</h2>
<?php if(isset($validation)):?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
<?php endif;?>
<form action="/buku/update/<?= $buku['id'] ?>" method="post">
    <div class="form-group">
        <label for="judul">Judul:</label>
        <input type="text" class="form-control" name="judul" id="judul" value="<?= $buku['judul'] ?>" required>
    </div>
    <div class="form-group">
        <label for="penulis">Penulis:</label>
        <input type="text" class="form-control" name="penulis" id="penulis" value="<?= $buku['penulis'] ?>" required>
    </div>
    <div class="form-group">
        <label for="penerbit">Penerbit:</label>
        <input type="text" class="form-control" name="penerbit" id="penerbit" value="<?= $buku['penerbit'] ?>" required>
    </div>
    <div class="form-group">
        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="number" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Ubah</button>
    <a href="/index.php/buku" class="btn btn-secondary">Kembali</a>
</form>
</div>
<?= $this->endSection() ?>
