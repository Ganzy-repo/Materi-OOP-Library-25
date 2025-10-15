<?php
$title = "Update BOOK";
require_once "Template/Header.php";
?>

<div class="container mt-5 shadow p-3">
    <div class="d-flex justify-content-between">
        <a href="/book">Back To Book List</a>
        <p>Update Book</p>
    </div>

    <?php if (isset($_SESSION['ERROR'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['ERROR'] ?></div>
        <?php unset($_SESSION['ERROR']); ?>
    <?php endif; ?>

    <form method="POST" action="/update-book">
        <input type="hidden" name="id" value="<?= $data['book']['id'] ?>">

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="category_id">Choose Category</label>
                    <select class="form-control" name="category_id">
                        <option value="">-- Choose Category --</option>
                        <?php foreach ($data['category'] as $cat) : ?>
                            <option value="<?= $cat['id'] ?>"
                                <?= $cat['id'] == $data['book']['category_id'] ? 'selected' : '' ?>>
                                <?= $cat['category_name'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input class="form-control" name="title"
                        value="<?= $data['book']['title'] ?>" placeholder="Title" />
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="author">Author</label>
                    <input class="form-control" name="author"
                        value="<?= $data['book']['author'] ?>" placeholder="Author" />
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="year">Year</label>
                    <input type="number" class="form-control" name="year"
                        value="<?= $data['book']['year'] ?>" placeholder="Year" />
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="qty">Qty</label>
                    <input type="number" class="form-control" name="qty"
                        value="<?= $data['book']['qty'] ?>" placeholder="Qty" />
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-warning" type="submit">Update Book</button>
            </div>
        </div>
    </form>
</div>

<?php require_once "Template/Footer.php" ?>