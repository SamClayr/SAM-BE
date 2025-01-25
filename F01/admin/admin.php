<?php
require_once '../php/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$message')";

    if (executeQuery($query)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Olympinoy</title>
    <link rel="icon" href="../assets/images/olympinoy-tab.png" type="img/icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1a237e;
            --secondary-blue: #283593;
            --bg-light: #f8f9fa;
            --text-dark: #333;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: "Poppins", sans-serif;
            scroll-behavior: smooth;
        }

        body {
            background: var(--bg-light);
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background: linear-gradient(to right, var(--primary-blue), var(--secondary-blue)) !important;
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .nav-link {
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--olympic-blue) !important;
        }

        .card {
            border: none;
            border-left: 4px solid var(--primary-blue);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #f8f9fa;
        }

        .btn-primary {
            background: linear-gradient(90deg, var(--primary-blue), var(--secondary-blue));
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal-content {
            border-radius: 0.5rem;
            border: none;
        }

        .modal-header {
            background: var(--primary-blue);
            color: white;
            border-radius: 0.5rem 0.5rem 0 0;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .table th {
            background: var(--bg-light);
            font-weight: 600;
            border-bottom: 2px solid var(--primary-blue);
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .feedback-card {
            transition: transform 0.2s;
        }

        .feedback-card:hover {
            transform: translateY(-2px);
        }

        .actions-column {
            width: 150px;
        }

        .navbar-dark {
            background-color: #1a1a1a !important;
        }

        .form-control:focus {
            border-color: #0066cc;
            box-shadow: 0 0 0 0.2rem rgba(0, 102, 204, 0.25);
        }

        .logout-btn {
            background: white;
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
            border-radius: 0.5rem;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: var(--primary-blue);
            color: white;
        }

        .actions-column {
            width: 100px;
            text-align: center;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
        }

        .table img {
            object-fit: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <div class="d-flex align-items-center">
                <img src="../assets/images/olympinoy.png" width="200" alt="Logo">
                <h3 class="text-white mb-0 ms-3 poppins-bold">Admin Dashboard</h3>
            </div>
            <a href="php/admin_logout.php" class="btn logout-btn poppins-medium">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </a>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 poppins-bold">Information Management</h5>
                            <button class="btn btn-primary poppins-medium" data-bs-toggle="modal"
                                data-bs-target="#addProductModal">
                                <i class="fas fa-plus me-2"></i>Add New Athlete
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="athletesTable">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Short Description</th>
                                        <th>Achievement</th>
                                        <th>Sport</th>
                                        <th>Category</th>
                                        <th>Medal</th>
                                        <th>Olympics</th>
                                        <th>Records</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="athletesTableBody">
                                    <?php
                                    $query = "SELECT * FROM athletes";
                                    $result = executeQuery($query);

                                    while ($athlete = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td><img src='../assets/images/" . $athlete['image'] . "' width='50' height='50' class='rounded'></td>";
                                        echo "<td>" . $athlete['name'] . "</td>";
                                        echo "<td>" . $athlete['short_description'] . "</td>";
                                        echo "<td>" . $athlete['achievement'] . "</td>";
                                        echo "<td>" . $athlete['sport'] . "</td>";
                                        echo "<td>" . $athlete['category'] . "</td>";
                                        echo "<td>" . $athlete['medal'] . "</td>";
                                        echo "<td>" . $athlete['olympics'] . "</td>";
                                        echo "<td>" . $athlete['records'] . "</td>";
                                        echo "<td class='actions-column'>
                            <button class='btn btn-sm btn-primary edit-btn' data-id='" . $athlete['id'] . "'>
                                <i class='fas fa-edit'></i>
                            </button>
                            <button class='btn btn-sm btn-danger delete-btn ms-1' data-id='" . $athlete['id'] . "'>
                                <i class='fas fa-trash'></i>
                            </button>
                          </td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header py-3">
                        <h5 class="mb-0 poppins-bold">User Feedback</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="feedbackTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody id="feedbackTableBody">
                                    <?php
                                    $query = "SELECT * FROM feedback ORDER BY id DESC";
                                    $result = executeQuery($query);

                                    while ($feedback = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $feedback['name'] . "</td>";
                                        echo "<td>" . $feedback['email'] . "</td>";
                                        echo "<td>" . $feedback['message'] . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title poppins-bold">Add New Athlete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addAthleteForm">
                        <div class="mb-3">
                            <label for="addImage" class="form-label">Image</label>
                            <input type="file" class="form-control" id="addImage" name="image" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="addName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="addName" required>
                        </div>
                        <div class="mb-3">
                            <label for="addShortDesc" class="form-label">Short Description</label>
                            <input type="text" class="form-control" id="addShortDesc" required>
                        </div>
                        <div class="mb-3">
                            <label for="addAchievement" class="form-label">Achievement</label>
                            <textarea class="form-control" id="addAchievement" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="addSport" class="form-label">Sport</label>
                            <input type="text" class="form-control" id="addSport" required>
                        </div>
                        <div class="mb-3">
                            <label for="addCategory" class="form-label">Category</label>
                            <input type="text" class="form-control" id="addCategory" required>
                        </div>
                        <div class="mb-3">
                            <label for="addMedal" class="form-label">Medal</label>
                            <input type="text" class="form-control" id="addMedal" required>
                        </div>
                        <div class="mb-3">
                            <label for="addOlympics" class="form-label">Olympics</label>
                            <input type="text" class="form-control" id="addOlympics" required>
                        </div>
                        <div class="mb-3">
                            <label for="addRecords" class="form-label">Records</label>
                            <input type="text" class="form-control" id="addRecords" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveAthlete">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editAthleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title poppins-bold">Edit Athlete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editAthleteForm">
                        <input type="hidden" id="editAthleteId">
                        <div class="mb-3">
                            <label for="editImage" class="form-label">Image</label>
                            <input type="file" class="form-control" id="editImage" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editShortDesc" class="form-label">Short Description</label>
                            <input type="text" class="form-control" id="editShortDesc" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAchievement" class="form-label">Achievement</label>
                            <textarea class="form-control" id="editAchievement" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editSport" class="form-label">Sport</label>
                            <input type="text" class="form-control" id="editSport" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCategory" class="form-label">Category</label>
                            <input type="text" class="form-control" id="editCategory" required>
                        </div>
                        <div class="mb-3">
                            <label for="editMedal" class="form-label">Medal</label>
                            <input type="text" class="form-control" id="editMedal" required>
                        </div>
                        <div class="mb-3">
                            <label for="editOlympics" class="form-label">Olympics</label>
                            <input type="text" class="form-control" id="editOlympics" required>
                        </div>
                        <div class="mb-3">
                            <label for="editRecords" class="form-label">Records</label>
                            <input type="text" class="form-control" id="editRecords" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateAthlete">Update</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this athlete?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="deleteAthleteId">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const athleteId = this.getAttribute('data-id');

                    fetch(`php/get_athlete.php?id=${athleteId}`)
                        .then(response => response.json())
                        .then(athlete => {
                            document.getElementById('editAthleteId').value = athlete.id;
                            document.getElementById('editName').value = athlete.name;
                            document.getElementById('editShortDesc').value = athlete.short_description;
                            document.getElementById('editAchievement').value = athlete.achievement;
                            document.getElementById('editSport').value = athlete.sport;
                            document.getElementById('editCategory').value = athlete.category;
                            document.getElementById('editMedal').value = athlete.medal;
                            document.getElementById('editOlympics').value = athlete.olympics;
                            document.getElementById('editRecords').value = athlete.records;

                            new bootstrap.Modal(document.getElementById('editAthleteModal')).show();
                        });
                });
            });

            document.getElementById('updateAthlete').addEventListener('click', function() {
                const formData = new FormData();
                formData.append('id', document.getElementById('editAthleteId').value);
                formData.append('name', document.getElementById('editName').value);
                formData.append('short_description', document.getElementById('editShortDesc').value);
                formData.append('achievement', document.getElementById('editAchievement').value);
                formData.append('sport', document.getElementById('editSport').value);
                formData.append('category', document.getElementById('editCategory').value);
                formData.append('medal', document.getElementById('editMedal').value);
                formData.append('olympics', document.getElementById('editOlympics').value);
                formData.append('records', document.getElementById('editRecords').value);

                if (document.getElementById('editImage').files[0]) {
                    formData.append('image', document.getElementById('editImage').files[0]);
                }

                fetch('php/update_athlete.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            location.reload();
                        } else {
                            alert('Error updating athlete');
                        }
                    });
            });

            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const athleteId = this.getAttribute('data-id');
                    document.getElementById('deleteAthleteId').value = athleteId;
                    new bootstrap.Modal(document.getElementById('deleteConfirmModal')).show();
                });
            });

            document.getElementById('confirmDelete').addEventListener('click', function() {
                const athleteId = document.getElementById('deleteAthleteId').value;

                fetch('php/delete_athlete.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            id: athleteId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            location.reload();
                        } else {
                            alert('Error deleting athlete');
                        }
                    });
            });

            document.getElementById('saveAthlete').addEventListener('click', function() {
                const formData = new FormData();
                formData.append('image', document.getElementById('addImage').files[0]);
                formData.append('name', document.getElementById('addName').value);
                formData.append('short_description', document.getElementById('addShortDesc').value);
                formData.append('achievement', document.getElementById('addAchievement').value);
                formData.append('sport', document.getElementById('addSport').value);
                formData.append('category', document.getElementById('addCategory').value);
                formData.append('medal', document.getElementById('addMedal').value);
                formData.append('olympics', document.getElementById('addOlympics').value);
                formData.append('records', document.getElementById('addRecords').value);

                fetch('php/add_athlete.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            location.reload();
                        } else {
                            alert('Error adding athlete');
                        }
                    });
            });

            setInterval(function() {
                fetch('php/get_feedback.php')
                    .then(response => response.json())
                    .then(feedbacks => {
                        const tbody = document.getElementById('feedbackTableBody');
                        tbody.innerHTML = '';

                        feedbacks.forEach(feedback => {
                            tbody.innerHTML += `
                    <tr>
                        <td>${feedback.name}</td>
                        <td>${feedback.email}</td>
                        <td>${feedback.message}</td>
                    </tr>
                `;
                        });
                    });
            }, 30000);
        });
    </script>
</body>

</html>