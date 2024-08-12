<header id="header" class="header d-flex align-items-center sticky-top">
    <a href="Alumni_dash.php" class="logo d-flex align-items-center me-auto">
        <img src="../img/background-removed.png" class="logo-img">
    </a>

    <!-- Navbar -->
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <div class="container">
            <form action="search.php" method="post">
            <div class="row height d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="form">
                        <input type="text" class="form-control form-input" placeholder="Search anything...">
                    </div>
                </div>
            </div>
            </form>
            
        </div>

        <nav id="navmenu" class="navmenu navbar navbar-expand-sm">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <!-- Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://img.icons8.com/?size=100&id=84898&format=png&color=000000" width="40"
                            height="40" id="plus">
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="../../views/profile/bio.php">View Profile</a></li>
                        <li><a class="dropdown-item" href="../../controller/Alumni/logout.php">Sign Out</a></li>
                    </ul>
                </div>

                <!-- Navbar Links -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="../public/Alumni_dash.php" class="nav-link active">Home</a></li>
                    <li class="nav-item"><a href="../public/message/users.php" class="nav-link">Messages</a></li>
                    <li class="nav-item"><a href="../public/jobs.php" class="nav-link">Jobs</a></li>
                    <li class="nav-item"><a href="../public/events.php" class="nav-link">Events</a></li>
                    <li class="nav-item"><a href="../public/gallery.php" class="nav-link">Gallery</a></li>
                    <li class="nav-item"><a href="../public/news.php" class="nav-link">News</a></li>
                    <li class="nav-item"><a href="#b2" class="nav-link">Notifications</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
