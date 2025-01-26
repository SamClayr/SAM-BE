<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    header('Location: admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Olympinoy</title>
    <link rel="icon" href="../assets/images/olympinoy-tab.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="index.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="col-md-6 left-panel d-none d-md-flex align-items-center justify-content-center">
                <div class="text-center">
                    <img src="../assets/images/olympinoy.png" width="500" class="mb-3">
                    <p class="lead text-white fw-bold">Admin Portal</p>
                    <p class="text-white-50 fw-regular">Secure access for authorized personnel only</p>
                </div>
            </div>
            <div class="col-md-6 auth-container d-flex align-items-center justify-content-center">
                <div class="auth-box bg-white p-4 rounded-4 shadow-lg" data-aos="fade-up">
                    <div class="text-center mb-4">
                        <i class="fas fa-medal auth-icon mb-3"></i>
                        <h2 class="auth-title" id="authTitle">Administrator Login</h2>
                        <p class="auth-subtitle text-muted" id="authSubtitle">Enter your credentials to continue</p>
                    </div>

                    <div id="loginAlert" class="alert d-none mb-3" role="alert"></div>

                    <form id="loginForm" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Admin Email</label>
                            <input type="email" class="form-control" id="loginEmail" required>
                            <div class="invalid-feedback">Please enter your admin email.</div>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" required>
                            <div class="invalid-feedback">Password is required.</div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3">Access Admin Panel</button>
                    </form>

                    <div class="text-center">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Contact system administrator for access
                        </small>
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
            const loginAlert = document.getElementById('loginAlert');

            function showAlert(message, type) {
                loginAlert.textContent = message;
                loginAlert.classList.remove('d-none', 'alert-success', 'alert-danger');
                loginAlert.classList.add(`alert-${type}`);
                setTimeout(() => loginAlert.classList.add('d-none'), 5000);
            }

            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                if (!loginForm.checkValidity()) {
                    e.stopPropagation();
                    loginForm.classList.add('was-validated');
                    return;
                }

                $.ajax({
                    type: 'POST',
                    url: 'php/admin_login.php',
                    data: {
                        email: $('#loginEmail').val(),
                        password: $('#loginPassword').val()
                    },
                    success: function(response) {
                        if (response === 'success') {
                            window.location.href = 'admin.php';
                        } else {
                            showAlert(response, 'danger');
                        }
                    },
                    error: function() {
                        showAlert('Server error occurred', 'danger');
                    }
                });
            });
        });
    </script>
</body>

</html>