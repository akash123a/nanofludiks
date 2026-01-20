<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MyApp - Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">MyApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                </ul>

                <!-- Admin Login Button -->
                <a href="{{ url('/admin/login') }}" class="btn btn-outline-light">
                    Admin Login
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Welcome to MyApp</h1>
        <p>Click the button above to go to the Admin Login page.</p>

        <a href="/register" class="btn btn-primary">User Register</a>
        <a href="/login" class="btn btn-success">User Login</a>
        <a href="/admin/login" class="btn btn-warning">Admin Login</a>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
