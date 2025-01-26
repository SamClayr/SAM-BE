<?php
session_start();
require_once 'php/connect.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$query = "SELECT * FROM athletes";
$result = executeQuery($query);
$athletes = [];
while ($row = mysqli_fetch_assoc($result)) {
    $athletes[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olympinoy</title>
    <link rel="icon" href="assets/images/olympinoy-tab.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="assets/stylesheet.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/images/olympinoy.png" width="180">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#videos">Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="php/logout.php" class="nav-link">
                            <button class="btn btn-light btn-sm">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="overlay"></div>
        <div class="container text-center">
            <h1 data-aos="fade-up">Filipino Olympic Medalists</h1>
            <p data-aos="fade-up" data-aos-delay="200">Celebrating the Pride of the Philippines</p>
        </div>
    </section>

    <section id="gallery" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4" data-aos="fade-up">Our Olympic Heroes</h2>
            <div class="row g-4 d-flex align-items-center justify-content-center">
                <?php foreach ($athletes as $athlete): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="card h-100">
                            <img src="assets/images/<?php echo $athlete['image']; ?>" class="card-img-top" alt="<?php echo $athlete['name']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $athlete['name']; ?></h5>
                                <p class="card-text"><?php echo $athlete['short_description']; ?></p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#athleteModal"
                                    data-athlete-id="<?php echo $athlete['id']; ?>">
                                    <i class="fas fa-info-circle me-2"></i>Learn More
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="modal fade" id="athleteModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <section id="videos" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4" data-aos="fade-up">Featured Videos</h2>
            <div class="row d-flex align-items-stretch justify-content-center">
                <div class="col-md-6 mb-4" data-aos="fade-up">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/4Ln2X6yA5iQ?si=z-a5-hX5Gvq-yTSB"
                            title="Olympic Highlights" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 mb-4" data-aos="fade-up">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/s0gQQzquHTI?si=H2VtMhUv7QjkAb7K"
                            title="Olympic Highlights" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 mb-4" data-aos="fade-up">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/YninxhM26Mk?si=Fe86jdbnoso1wL6N"
                            title="Olympic Highlights" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6 mb-4" data-aos="fade-up">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/j3DdSMBocPc?si=6Pi2gy9EO0CBxGPu"
                            title="Olympic Highlights" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4" data-aos="fade-up">Contact Us</h2>
            <div class="row">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="contact-form">
                        <form id="feedbackForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2"></i>Send Feedback
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="contact-info">
                        <h3 class="mb-4">Get in Touch</h3>
                        <div class="info-item mb-4">
                            <i class="fas fa-map-marker-alt me-3"></i>
                            <div>
                                <h5>Address</h5>
                                <p>Polytechnic University of the Philippines - Sto. Tomas Campus, Sto. Tomas, Batangas</p>
                            </div>
                        </div>
                        <div class="info-item mb-4">
                            <i class="fas fa-phone me-3"></i>
                            <div>
                                <h5>Phone</h5>
                                <p>+63 912 345 6789</p>
                            </div>
                        </div>
                        <div class="info-item mb-4">
                            <i class="fas fa-envelope me-3"></i>
                            <div>
                                <h5>Email</h5>
                                <p>info@olympinoy.ph</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-clock me-3"></i>
                            <div>
                                <h5>Office Hours</h5>
                                <p>Monday - Saturday: 7:00 AM - 9:00 PM</p>
                                <p>Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 Olympinoy. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true
            });

            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        document.querySelectorAll('[data-athlete-id]').forEach(button => {
            button.addEventListener('click', function() {
                const athleteId = this.getAttribute('data-athlete-id');

                fetch(`php/get_athlete.php?id=${athleteId}`)
                    .then(response => response.json())
                    .then(athlete => {
                        const modal = document.getElementById('athleteModal');
                        modal.querySelector('.modal-title').textContent = athlete.name;
                        modal.querySelector('.modal-body').innerHTML = `
                        <div class="text-center mb-4">
                            <img src="assets/images/${athlete.image}" class="img-fluid mb-3" alt="${athlete.name}">
                        </div>
                        <div class="athlete-info">
                            <h4 class="mb-3">Achievement</h4>
                            <p>${athlete.achievement}</p>
                            <div class="achievement-details mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5><i class="fas fa-trophy text-warning me-2"></i>Medal Details</h5>
                                        <ul class="list-unstyled">
                                            <li><strong>Sport:</strong> ${athlete.sport}</li>
                                            <li><strong>Category:</strong> ${athlete.category}</li>
                                            <li><strong>Medal:</strong> ${athlete.medal}</li>
                                            <li><strong>Olympics:</strong> ${athlete.olympics}</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h5><i class="fas fa-star text-warning me-2"></i>Records</h5>
                                        <ul class="list-unstyled">
                                            <li>${athlete.records}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    });
            });
        });

        const feedbackForm = document.getElementById('feedbackForm');
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert d-none mt-3';
        feedbackForm.appendChild(alertDiv);

        feedbackForm.addEventListener('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'php/feedback.php',
                data: {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    message: $('#message').val()
                },
                success: function(response) {
                    const result = JSON.parse(response);
                    alertDiv.textContent = result.message;
                    alertDiv.classList.remove('d-none', 'alert-success', 'alert-danger');
                    alertDiv.classList.add(result.status === 'success' ? 'alert-success' : 'alert-danger');

                    if (result.status === 'success') {
                        feedbackForm.reset();
                    }

                    setTimeout(() => {
                        alertDiv.classList.add('d-none');
                    }, 5000);
                },
                error: function() {
                    alertDiv.textContent = 'An error occurred. Please try again.';
                    alertDiv.classList.remove('d-none', 'alert-success', 'alert-danger');
                    alertDiv.classList.add('alert-danger');

                    setTimeout(() => {
                        alertDiv.classList.add('d-none');
                    }, 5000);
                }
            });
        });
    </script>
</body>

</html>