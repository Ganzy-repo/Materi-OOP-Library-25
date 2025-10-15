<?php
$title = "DASHBOARD";
require_once "Template/Header.php";
?>

<div class="container mt-5 shadow p-3">
    <div class="d-flex justify-content-between">
        <a href="/dashboard">Back To Dashboard</a>
        <p>Create Book</p>
    </div>
    
    <?php if (isset($_SESSION['ERROR'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['ERROR'] ?></div>
        <?php unset($_SESSION['ERROR']); ?>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['SUCCESS'])): ?>
        <div class="alert alert-success"><?= $_SESSION['SUCCESS'] ?></div>
        <?php unset($_SESSION['SUCCESS']); ?>
    <?php endif; ?>

    <form method="POST" action="/create-book">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="category_id">Choose Category</label>
                    <select class="form-control" name="category_id">
                        <option value="">-- Choose Category --</option>
                        <?php foreach ($data as $book) : ?>
                            <option value="<?= $book['id'] ?>">
                                <?= $book['category_name'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input
                        class="form-control"
                        name="title"
                        placeholder="Title" />
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="Author">Author</label>
                    <input
                        class="form-control"
                        name="author"
                        placeholder="Author" />
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="year">Year</label>
                    <input
                        type="number"
                        class="form-control"
                        name="year"
                        placeholder="Year" />
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-group mb-3">
                    <label for="Qty">Qty</label>
                    <input
                        type="number"
                        class="form-control"
                        name="qty"
                        placeholder="Qty" />
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>  

<?php require_once "Template/Footer.php" ?>