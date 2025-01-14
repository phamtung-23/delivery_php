<?php
session_start();

// Check if the user is logged in; if not, redirect to login
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Bạn chưa đăng nhập! Vui lòng đăng nhập lại.'); window.location.href = '../../index.php';</script>";
    exit();
}

// Retrieve full name and email from session
$fullName = $_SESSION['full_name'];
$userEmail = $_SESSION['user_id']; // operator_email matches user_id

?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <main>
        <nav class="navbar navbar-expand-md bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Delivery</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Contact</a>
                        </li>
                    </ul>
                    <form action="../../logout.php" class="d-flex" role="search">
                        <button class="btn btn-outline-danger" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container pt-3">
            <h2>Admin Dashboard</h2>
            <p>Welcome, <?php echo $fullName; ?>!</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-success mt-2 mb-2">Add Order</button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="table-responsive">
                <table id="adminTable" class="table">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item name</th>
                            <th scope="col">Weight (kg)</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Delivery Person</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>2</td>
                            <td>Thornton</td>
                            <td>@mdo, abc, x</td>
                            <td>John</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>2</td>
                            <td>Thornton</td>
                            <td>@mdo, abc, x</td>
                            <td>John</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer id="sticky-footer" class="flex-shrink-0 py-2 bg-dark text-white-50">
        <div class="container text-center">
            <small>© 2025 Phần mềm soffice phát triển bởi Hienlm 0988838487</small>
        </div>
    </footer>
    <script>
        $(document).ready(function() {
            if (window.innerWidth <= 550) {
                $('#adminTable').DataTable({
                    scrollY: true, // Set the vertical scrolling height
                    scrollX: true, // Set the vertical scrolling height
                    scrollCollapse: true, // Allow the table to reduce height if less content
                    paging: true, // Enable pagination
                    searching: true, // Enable searching
                    ordering: true, // Enable column sorting
                    info: true, // Show table info
                    language: {
                        search: "Search:",
                        paginate: {
                            next: "Next",
                            previous: "Previous"
                        }
                    }
                });
            } else {
                $('#adminTable').DataTable({
                    paging: true, // Enable pagination
                    searching: true, // Enable searching
                    ordering: true, // Enable column sorting
                    info: true, // Show table info
                    language: {
                        search: "Search:",
                        paginate: {
                            next: "Next",
                            previous: "Previous"
                        }
                    }
                });
            }
        });
                
    </script>

</body>

</html>