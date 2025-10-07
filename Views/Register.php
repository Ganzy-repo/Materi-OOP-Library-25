<?php
$title = "Auth";
include "Template/Header.php";
session_start();
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4">Register</h3>

                    <!-- ERROR ALERT -->
                    <?php if (isset($_SESSION["ERROR"])) : ?>
                        <div class="alert alert-danger rounded-3 text-center" role="alert">
                            <?= $_SESSION["ERROR"] ?>
                        </div>
                        <?php session_unset(); ?>
                    <?php endif; ?>

                    <!-- SUCCESS ALERT -->
                    <?php if (isset($_SESSION["SUCCESS"])) : ?>
                        <div class="alert alert-success rounded-3 text-center" role="alert">
                            <?= $_SESSION["SUCCESS"] ?>
                        </div>
                        <?php session_unset(); ?>
                    <?php endif; ?>

                    <form method="post" action="/auth">
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Full Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="full_name"
                                name="full_name"
                                placeholder="Enter your full name"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Enter your email"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Enter your password"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input
                                type="tel"
                                class="form-control"
                                id="phone"
                                name="phone"
                                placeholder="Enter your phone number"
                                required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill">
                                Register now
                            </button>
                        </div>

                        <p class="text-center mt-3 mb-0">
                            Already have an account? 
                            <a href="login.php" class="text-decoration-none">Login here</a>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include "Template/Footer.php"; ?>
