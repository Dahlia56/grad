<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Profile Page with Flexbox Cards</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for profile page */
        .profile-header {
            text-align: center;
            padding: 30px;
            background-color: #f8f9fa;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profile-content {
            padding: 20px;
        }

        .tab-content {
            display: flex;
            flex-direction: column;
        }

        .tab-card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Space between cards */
        }

        .tab-card {
            flex: 1 1 calc(33.333% - 20px); /* Adjusts card width and space between cards */
            max-width: calc(33.333% - 20px);
            margin-bottom: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .profile-header {
                padding: 20px;
            }

            .profile-content {
                padding: 15px;
            }

            .profile-img {
                width: 120px;
                height: 120px;
            }

            .tab-card-container {
                flex-direction: column;
            }

            .tab-card {
                flex: 1 1 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-header">
        <img src="path/to/photo.jpg" alt="Profile Photo" class="profile-img">
        <h1 class="display-4">John Doe</h1>
        <p class="lead">Web Developer | Designer | Freelancer</p>
    </div>

    <!-- Tabs Section -->
    <ul class="nav nav-tabs" id="profileTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="post-tab" data-bs-toggle="tab" data-bs-target="#post" type="button" role="tab" aria-controls="post" aria-selected="true">Post</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false">About Me</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button" role="tab" aria-controls="education" aria-selected="false">Education</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button" role="tab" aria-controls="skills" aria-selected="false">Skills</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="experience-tab" data-bs-toggle="tab" data-bs-target="#experience" type="button" role="tab" aria-controls="experience" aria-selected="false">Work Experience</button>
        </li>
    </ul>

    <div class="tab-content profile-content" id="profileTabContent">
        <div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post-tab">
            <div class="tab-card-container">
                <div class="card tab-card">
                    <div class="card-body">
                        <h5 class="card-title">Post</h5>
                        <p class="card-text">Your posts will appear here.</p>
                    </div>
                </div>
                <!-- Add more cards as needed -->
            </div>
        </div>
        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
            <div class="tab-card-container">
                <div class="card tab-card">
                    <div class="card-body">
                    <h5 class="mb-3">About</h5>
                <p class="lead mb-3"><?php echo htmlspecialchars($user_about) ?></p>
                <h5 class="mb-3">Profile</h5>
                <div class="row g-0">
                  <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                    <div class="p-2">First Name</div>
                  </div>
                  <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                    <div class="p-2"><?php echo htmlspecialchars($user_name) ?></div>
                  </div>
                  <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                    <div class="p-2">Last Name</div>
                  </div>
                  <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                    <div class="p-2"><?php echo htmlspecialchars($user_surname) ?></div>
                  </div>
                  <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                    <div class="p-2">Education</div>
                  </div>
                  <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                    <div class="p-2"><?php echo htmlspecialchars($user_education) ?></div>
                  </div>
                
                  <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                    <div class="p-2">Job</div>
                  </div>
                  <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                    <div class="p-2"><?php echo htmlspecialchars($user_job) ?></div>
                  </div>
                  <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                    <div class="p-2">Company</div>
                  </div>
                  <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                    <div class="p-2"><?php echo htmlspecialchars($user_company) ?></div>
                  </div>
                  <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                    <div class="p-2">Phone</div>
                  </div>
                  <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                    <div class="p-2">+1 (248) 679-8745</div>
                  </div>
                  <div class="col-5 col-md-3 bg-light border-bottom border-white border-3">
                    <div class="p-2">Email</div>
                  </div>
                  <div class="col-7 col-md-9 bg-light border-start border-bottom border-white border-3">
                    <div class="p-2"><?php echo htmlspecialchars($user_email) ?></div>
                  </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
            <div class="tab-card-container">
                <div class="card tab-card">
                    <div class="card-body">
                        <h5 class="card-title">Education</h5>
                        <p class="card-text">Bachelor of Information and Communication Technology</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
            <div class="tab-card-container">
                <div class="card tab-card">
                    <div class="card-body">
                        <h5 class="card-title">Skills</h5>
                        <p class="card-text">HTML, CSS, JavaScript, PHP, MySQL</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
            <div class="tab-card-container">
                <div class="card tab-card">
                    <div class="card-body">
                        <h5 class="card-title">Work Experience</h5>
                        <p class="card-text">Freelance Web Developer at XYZ Company</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
