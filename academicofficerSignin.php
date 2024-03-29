<!DOCTYPE html>
<html>

<head>
    <title>New Tech | Admin Sign In</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
</head>

<body class="main-body text-white">

    <div class="container-fluid justify-content-center" style="margin-top: 100px;">
        <div class="row align-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 logo"></div>

                    <div class="col-12">
                        <p class="text-center text-warning title01">Hi, Welcome to the online class.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center p-5">
                <div class="row">
                    <div class="col-6 d-none d-lg-block background"></div>

                    <div class="col-12 col-lg-6  d-block">
                        <div class="row g-3">

                            <div class="col-12">
                                <p class="title02">Sign In to Your Account</p>
                                <span class="text-danger" id="msg2"></span>
                            </div>

                            <?php

                            $email = "";
                            $password = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }
                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }

                            ?>

                            <div class="col-12">
                                <label class="form-labale">Email</label>
                                <input class="form-control" type="email" value="<?php echo $email; ?>" id="email2">
                            </div>

                            <div class="col-12">
                                <label class="form-labale">Password</label>
                                <input class="form-control" type="password" value="<?php echo $password; ?>" id="password2">
                            </div>

                            <div class="col-6">
                                <input type="checkbox" class="form-check-input" value="1" id="rememberMe" />
                                <label class="form-check-label">Remember Me</label>
                            </div>

                            <div class="col-6">
                                <a herf="#" class="link-primary" onclick="forgotPassword();">Forgot Password</a>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-warning" onclick="academicofficerSignin();">Sign In</button>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-dark" onclick="changeView();">New to timeShop Join Now</button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" id="verification_model">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Admin Verification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label"> Enter the verification code you got by an Email</label>
                        <input type="text" class="form-control" id="vcode" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>