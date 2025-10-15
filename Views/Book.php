<?php
$title = "Home";
include "Template/Header.php";
?>

<div class="container mt-5 shadow p-3">
    <div class="d-flex justify-content-between">
        <a href="/">Back To Home</a>
        <p>List Book</p>
        <?php if ($isLogin) : ?>
            <a href="/logout">Logout</a>
        <?php endif; ?>
    </div>
    
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="input-group input-group-sm mb-3">
                <input
                    type="text" class="form-control"
                    aria-label="Sizing example input"
                    placeholder="Search book title here.."
                    aria-describedby="inputGroup-sizing-sm">
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="input-group input-group-sm mb-3">
                <select class="form-control">
                    <option value="">-- Choose Category --</option>
                    <?php foreach ($data['category'] as $cat) : ?>
                        <option value="<?= $cat['id'] ?>">
                            <?= $cat['category_name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="d-grid gap-1">
                <button class="btn btn-success rounded">Submit</button>
            </div>
        </div>
    </div>

    <?php if (empty($data['books'])): ?>
        <div class="alert alert-info">Tidak ada data buku.</div>
    <?php else: ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Qty</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['books'] as $index => $book): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $book['title'] ?></td>
                    <td><?= $book['author'] ?></td>
                    <td><?= $book['year'] ?></td>
                    <td><?= $book['category_name'] ?></td>
                    <td><?= $book['qty'] ?></td>
                    <td>
                        <a href="/edit-book?id=<?= $book['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/delete-book?id=<?= $book['id'] ?>" class="btn btn-danger btn-sm" 
                           onclick="return confirm('Yakin hapus buku ini?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require_once "Template/Footer.php"; ?>