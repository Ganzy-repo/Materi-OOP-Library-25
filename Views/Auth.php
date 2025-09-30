<?php
$title = "Login";
include "Template/Header.php";
session_start();
?>

<div class="container m-5">
    <div class="d-flex justify-content-center">
        <div class="card p-3 shadow-lg" style="width: 18rem;">

            <!-- CEK INPUT VALIDATION -->
            <?php if (isset($_SESSION["ERROR"])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION["ERROR"] ?>
                </div>
            <?php
                session_unset();
            endif; ?>

            <!-- REGISTER SUCCESS -->
            <?php if (isset($_SESSION["SUCCESS"])) : ?>
                <div class="alert alert-success" role="success">
                    <?= $_SESSION["SUCCESS"] ?>
                </div>
            <?php
                session_unset();
            endif; ?>

            <form method="post" action="/auth">
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="full_name"
                        name="full_name"
                        placeholder="fill your full name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="fill your email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="fill your password">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input
                        type="number"
                        class="form-control"
                        id="phone"
                        name="phone"
                        placeholder="fill your phone number">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "Template/Footer.php"; ?>