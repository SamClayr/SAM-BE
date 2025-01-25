<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup - Olympinoy</title>
    <link rel="icon" href="assets/images/olympinoy-tab.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="assets/login.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-md-6 left-panel d-none d-md-flex align-items-center justify-content-center">
                <div class="text-center">
                    <img src="assets/images/olympinoy.png" width="500" class="mb-3">
                    <p class="lead text-white fw-regular">Celebrating Filipino Excellence in the Olympics</p>
                    <p class="text-white-50 fw-light">Discover the stories of our athletes.</p>
                </div>
            </div>
            <div class="col-md-6 auth-container d-flex align-items-center justify-content-center">
                <div class="auth-box bg-white p-4 rounded-4 shadow-lg" data-aos="fade-up">
                    <div class="text-center mb-4">
                        <i class="fas fa-medal auth-icon mb-3"></i>
                        <h2 class="auth-title" id="authTitle">Welcome Back</h2>
                        <p class="auth-subtitle text-muted" id="authSubtitle">Sign in to access your account</p>
                    </div>

                    <div id="loginAlert" class="alert d-none mb-3" role="alert"></div>
                    <div id="signupAlert" class="alert d-none mb-3" role="alert"></div>

                    <form id="loginForm" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="loginEmail" required>
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" required>
                            <div class="invalid-feedback">Password is required.</div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3">Sign In</button>
                    </form>

                    <form id="signupForm" class="needs-validation d-none" novalidate>
                        <div class="mb-3">
                            <label for="signupUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="signupUsername" required>
                            <div class="invalid-feedback">Username is required.</div>
                        </div>
                        <div class="mb-3">
                            <label for="signupEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="signupEmail" required>
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>
                        <div class="mb-3">
                            <label for="signupPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signupPassword" required>
                            <div class="invalid-feedback">Password is required.</div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3">Sign Up</button>
                    </form>

                    <div class="text-center">
                        <p class="mb-0">
                            <span id="authToggleText">Don't have an account?</span>
                            <a href="#" id="authToggleBtn" class="text-decoration-none ms-1">Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const signupForm = document.getElementById('signupForm');
            const authTitle = document.getElementById('authTitle');
            const authSubtitle = document.getElementById('authSubtitle');
            const authToggleBtn = document.getElementById('authToggleBtn');
            const authToggleText = document.getElementById('authToggleText');
            const loginAlert = document.getElementById('loginAlert');
            const signupAlert = document.getElementById('signupAlert');
            let isLogin = true;

            function showAlert(element, message, type) {
                element.textContent = message;
                element.classList.remove('d-none', 'alert-success', 'alert-danger');
                element.classList.add(`alert-${type}`);
                setTimeout(() => element.classList.add('d-none'), 5000);
            }

            function resetForms() {
                loginForm.reset();
                signupForm.reset();
                loginForm.classList.remove('was-validated');
                signupForm.classList.remove('was-validated');
                loginAlert.classList.add('d-none');
                signupAlert.classList.add('d-none');
            }

            authToggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                isLogin = !isLogin;
                resetForms();

                if (isLogin) {
                    loginForm.classList.remove('d-none');
                    signupForm.classList.add('d-none');
                    authTitle.textContent = 'Welcome Back';
                    authSubtitle.textContent = 'Sign in to access your account';
                    authToggleText.textContent = "Don't have an account?";
                    authToggleBtn.textContent = 'Sign Up';
                } else {
                    loginForm.classList.add('d-none');
                    signupForm.classList.remove('d-none');
                    authTitle.textContent = 'Create Account';
                    authSubtitle.textContent = 'Join the Olympic community';
                    authToggleText.textContent = 'Already have an account?';
                    authToggleBtn.textContent = 'Sign In';
                }
            });

            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                if (!loginForm.checkValidity()) {
                    e.stopPropagation();
                    loginForm.classList.add('was-validated');
                    return;
                }

                $.ajax({
                    type: 'POST',
                    url: 'php/login.php',
                    data: {
                        email: $('#loginEmail').val(),
                        password: $('#loginPassword').val()
                    },
                    success: function(response) {
                        if (response === 'success') {
                            window.location.href = 'user.php';
                        } else {
                            showAlert(loginAlert, response, 'danger');
                        }
                    }
                });
            });

            signupForm.addEventListener('submit', function(e) {
                e.preventDefault();
                if (!signupForm.checkValidity()) {
                    e.stopPropagation();
                    signupForm.classList.add('was-validated');
                    return;
                }

                $.ajax({
                    type: 'POST',
                    url: 'php/signup.php',
                    data: {
                        username: $('#signupUsername').val(),
                        email: $('#signupEmail').val(),
                        password: $('#signupPassword').val()
                    },
                    success: function(response) {
                        if (response === 'success') {
                            showAlert(signupAlert, 'Registration successful! You can now login.', 'success');
                            setTimeout(() => {
                                resetForms();
                                authToggleBtn.click();
                            }, 1500);
                        } else {
                            showAlert(signupAlert, response, 'danger');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>