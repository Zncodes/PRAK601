<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="mt-5"></div>

<h1 class="text-center mb-4">Data Buku</h1>

<?php if (session()->get('logged_in')) : ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a href="/buku/create" class="btn btn-primary">Tambah Buku</a>
        </div>

        <form method="get" action="/buku" class="form-inline">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Cari buku..." value="<?= $search ?>">
            </div>
            <div class="form-group mx-sm-3">
                <select name="sort" class="form-control">
                    <option value="">Urutkan berdasarkan...</option>
                    <option value="judul" <?= $sort == 'judul' ? 'selected' : '' ?>>Judul</option>
                    <option value="penulis" <?= $sort == 'penulis' ? 'selected' : '' ?>>Penulis</option>
                    <option value="penerbit" <?= $sort == 'penerbit' ? 'selected' : '' ?>>Penerbit</option>
                    <option value="tahun_terbit" <?= $sort == 'tahun_terbit' ? 'selected' : '' ?>>Tahun Terbit</option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-primary">Cari</button>
            <a href="/buku" class="btn btn-outline-secondary ml-2">Show all</a>
        </form>

        <div>
            <a href="#" class="btn btn-success">Selamat Datang, <?= session()->get('username') ?></a>
            <a href="/logout" class="btn btn-danger">Logout</a>
        </div>
    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>
                    <a href="/buku?sort=judul&sort_order=<?= $sort == 'judul' && $sort_order == 'ASC' ? 'DESC' : 'ASC' ?>" style="color:white">
                        Judul <?= $sort == 'judul' ? ($sort_order == 'ASC' ? '▲' : '▼') : '' ?>
                    </a>
                </th>
                <th>
                    <a href="/buku?sort=penulis&sort_order=<?= $sort == 'penulis' && $sort_order == 'ASC' ? 'DESC' : 'ASC' ?>" style="color:white">
                        Penulis <?= $sort == 'penulis' ? ($sort_order == 'ASC' ? '▲' : '▼') : '' ?>
                    </a>
                </th>
                <th>
                    <a href="/buku?sort=penerbit&sort_order=<?= $sort == 'penerbit' && $sort_order == 'ASC' ? 'DESC' : 'ASC' ?>" style="color:white">
                        Penerbit <?= $sort == 'penerbit' ? ($sort_order == 'ASC' ? '▲' : '▼') : '' ?>
                    </a>
                </th>
                <th>
                    <a href="/buku?sort=tahun_terbit&sort_order=<?= $sort == 'tahun_terbit' && $sort_order == 'ASC' ? 'DESC' : 'ASC' ?>" style="color:white">
                        Tahun Terbit <?= $sort == 'tahun_terbit' ? ($sort_order == 'ASC' ? '▲' : '▼') : '' ?>
                    </a>
                </th>

                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bukus as $buku) : ?>
                <tr>
                    <td><?= $buku['judul'] ?></td>
                    <td><?= $buku['penulis'] ?></td>
                    <td><?= $buku['penerbit'] ?></td>
                    <td><?= $buku['tahun_terbit'] ?></td>
                    <td class="text-center">
                        <a href="/buku/edit/<?= $buku['id'] ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                        <a href="/buku/delete/<?= $buku['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="mb-5"></div>

<?= $this->endSection() ?>