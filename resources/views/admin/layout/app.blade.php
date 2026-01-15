{{-- <!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
</head>

<body>
    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a> |
        <a href="{{ route('admin.logout') }}">Logout</a>
    </nav>


    <main>
        @yield('content')
    </main>
</body>

</html>

 --}}






























<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --success-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --light-color: #f8f9fc;
            --dark-color: #5a5c69;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fc;
            min-height: 100vh;
        }

        .sidebar {
            background: linear-gradient(180deg, var(--primary-color) 0%, #224abe 100%);
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            z-index: 100;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .sidebar-brand {
            padding: 1.5rem 1rem;
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .sidebar-item {
            padding: 0.5rem 1rem;
            margin: 0.25rem 1rem;
            border-radius: 0.35rem;
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.3s;
        }

        .sidebar-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            text-decoration: none;
        }

        .sidebar-item.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .sidebar-item i {
            width: 20px;
            margin-right: 10px;
            text-align: center;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar-custom {
            background-color: white;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            padding: 1rem 1.5rem;
        }

        .navbar-custom .navbar-nav .nav-link {
            color: var(--dark-color);
            font-weight: 600;
        }

        .navbar-custom .navbar-nav .nav-link:hover {
            color: var(--primary-color);
        }

        .user-dropdown img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .content-card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            border-left: 0.25rem solid var(--primary-color);
            padding: 1rem;
        }

        .stat-card.success {
            border-left-color: var(--success-color);
        }

        .stat-card.warning {
            border-left-color: var(--warning-color);
        }

        .stat-card.danger {
            border-left-color: var(--danger-color);
        }

        .stat-card .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .stat-card .stat-label {
            font-size: 0.9rem;
            color: var(--secondary-color);
            text-transform: uppercase;
        }

        .footer {
            text-align: center;
            padding: 1.5rem;
            color: var(--secondary-color);
            font-size: 0.9rem;
            border-top: 1px solid #e3e6f0;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar d-none d-md-block">
            <div class="sidebar-brand">
                <i class="bi bi-speedometer2"></i> AdminPanel
            </div>

            <div class="sidebar-menu mt-4">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-item d-block active">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>

                <a href="{{ route('admin.slider.index') }}" class="sidebar-item d-block">
                    <i class="bi bi-file-text"></i> Slider
                </a>

                <a href="{{ route('home.index') }}" class="sidebar-item d-block">
                    <i class="bi bi-bar-chart"></i> Home Section
                </a>
                <a href="{{ route('admin.blog.index') }}" class="sidebar-item d-block">
                    <i class="bi bi-people"></i> Blogs
                </a>
                {{-- <a href="{{ route('services.index') }}" class="sidebar-item d-block">
                    <i class="bi bi-people"></i> Service-section
                </a> --}}
                <a href=" " class="sidebar-item d-block">
                    <i class="bi bi-people"></i> Service-section
                </a>

                <a href="{{ route('faq.index') }}" class="sidebar-item d-block">
                    <i class="bi bi-bar-chart"></i> Faqs
                </a>
                <a href="{{ route('career') }}" class="sidebar-item d-block">
                    <i class="bi bi-bar-chart"></i> Career Applications
                </a>
                <a href="{{ route('admin.products.index') }}"
                    class="sidebar-item d-block {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="bi bi-bar-chart"></i> Products
                </a>

                <a href="#" class="sidebar-item d-block">
                    <i class="bi bi-gear"></i> Settings
                </a>
                <a href="{{ route('admin.logout') }}" class="sidebar-item d-block text-danger mt-5">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>

            <div class="sidebar-footer position-absolute bottom-0 start-0 p-3 w-100">
                <div class="text-center text-white-50 small">
                    <div>Admin Panel v1.0</div>
                    <div>&copy; 2023</div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content w-100">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg navbar-custom rounded mb-4">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-speedometer2 me-1"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown">
                                    <i class="bi bi-caret-down-fill me-1"></i> Quick Actions
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Add User</a></li>
                                    <li><a class="dropdown-item" href="#">Create Post</a></li>
                                    <li><a class="dropdown-item" href="#">View Reports</a></li>
                                </ul>
                            </li>
                        </ul>

                        <div class="d-flex align-items-center user-dropdown">
                            <img src="https://ui-avatars.com/api/?name=Admin+User&background=4e73df&color=ffffff&size=128"
                                alt="Admin User">
                            <div class="me-3">
                                <div class="fw-bold">Admin User</div>
                                <div class="text-muted small">Administrator</div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">
                                    <i class="bi bi-gear"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i
                                                class="bi bi-person me-2"></i>Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="bi bi-bell me-2"></i>Notifications</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i
                                                class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                <!-- Dashboard Stats -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="content-card stat-card">
                            <div class="stat-value">2,345</div>
                            <div class="stat-label">Total Users</div>
                            <div class="small text-muted mt-2">
                                <i class="bi bi-arrow-up text-success"></i> 12% increase
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="content-card stat-card success">
                            <div class="stat-value">1,234</div>
                            <div class="stat-label">Active Sessions</div>
                            <div class="small text-muted mt-2">
                                <i class="bi bi-arrow-up text-success"></i> 8% increase
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="content-card stat-card warning">
                            <div class="stat-value">567</div>
                            <div class="stat-label">Pending Requests</div>
                            <div class="small text-muted mt-2">
                                <i class="bi bi-arrow-down text-danger"></i> 3% decrease
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="content-card stat-card danger">
                            <div class="stat-value">89</div>
                            <div class="stat-label">Issues Reported</div>
                            <div class="small text-muted mt-2">
                                <i class="bi bi-arrow-up text-danger"></i> 5% increase
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="content-card mb-4">
                            <h4 class="card-title mb-3">
                                <i class="bi bi-bar-chart me-2"></i> Activity Overview
                            </h4>
                            <p class="text-muted">This is where your main content goes using @yield('content') in
                                Laravel.</p>
                            <div class="mt-4">
                                <h5>Sample Dashboard Content</h5>
                                <p>You can replace this with your actual blade content that extends this layout.</p>
                                <div class="alert alert-info">
                                    <i class="bi bi-info-circle me-2"></i>
                                    This is a Bootstrap 5 admin panel template. The original navigation links are
                                    preserved:
                                    <strong><a href="{{ route('admin.dashboard') }}">Dashboard</a></strong> and
                                    <strong><a href="{{ route('admin.logout') }}">Logout</a></strong>.
                                </div>

                                <!-- Example content that would come from @yield('content') -->
                                {{-- <div class="border p-3 rounded bg-light">
                                    <h6>Content from child view would appear here:</h6>
                                    <div class="p-2 border-start border-3 border-primary">
                                        @yield('content')
                                    </div>
                                    <p class="mt-2 small text-muted">The above box shows where content from your blade
                                        files would be inserted.</p>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="content-card mb-4">
                            <h5 class="card-title mb-3">
                                <i class="bi bi-clock-history me-2"></i> Recent Activity
                            </h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex px-0">
                                    <div class="me-3">
                                        <div class="bg-primary text-white rounded-circle p-2">
                                            <i class="bi bi-person-plus"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div>New user registered</div>
                                        <div class="small text-muted">5 minutes ago</div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex px-0">
                                    <div class="me-3">
                                        <div class="bg-success text-white rounded-circle p-2">
                                            <i class="bi bi-check-circle"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div>Server backup completed</div>
                                        <div class="small text-muted">1 hour ago</div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex px-0">
                                    <div class="me-3">
                                        <div class="bg-warning text-white rounded-circle p-2">
                                            <i class="bi bi-exclamation-triangle"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div>High memory usage alert</div>
                                        <div class="small text-muted">2 hours ago</div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="content-card">
                            <h5 class="card-title mb-3">
                                <i class="bi bi-info-circle me-2"></i> System Status
                            </h5>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Server Load</span>
                                    <span>65%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" style="width: 65%"></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Database</span>
                                    <span>Normal</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-info" style="width: 90%"></div>
                                </div>
                            </div>
                            <div class="mb-0">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Uptime</span>
                                    <span>99.9%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" style="width: 99%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="footer content-card mt-4">
                    <div class="row">
                        <div class="col-md-6 text-md-start">
                            <a href="{{ route('admin.dashboard') }}" class="text-decoration-none me-3">
                                <i class="bi bi-speedometer2 me-1"></i> Dashboard
                            </a>
                            <a href="{{ route('admin.logout') }}" class="text-decoration-none text-danger">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </a>
                        </div>
                        <div class="col-md-6 text-md-end">
                            &copy; 2023 Admin Panel. All rights reserved.
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Simple script to handle sidebar active state
        document.addEventListener('DOMContentLoaded', function() {
            // Get current page URL
            const currentUrl = window.location.href;

            // Find all sidebar items
            const sidebarItems = document.querySelectorAll('.sidebar-item');

            // Check each sidebar item
            sidebarItems.forEach(item => {
                const itemHref = item.getAttribute('href');

                // If this item's href matches the current URL, make it active
                if (currentUrl.includes(itemHref) && itemHref !== '#') {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });


            const sidebar = document.querySelector('.sidebar');
            const navbarToggler = document.querySelector('.navbar-toggler');

            if (navbarToggler) {
                navbarToggler.addEventListener('click', function() {
                    sidebar.classList.toggle('d-none');
                    sidebar.classList.toggle('d-block');
                });
            }
        });
    </script>
</body>

</html>
