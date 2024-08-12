<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Profile Page</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for profile page */
        .profile-header {
            text-align: center;
            padding: 30px;
            background-color: #f8f9fa;
            background-image:url("../img/image1.jpg");
            background-repeat: no-repeat;
            height: 400px;
            border-radius:30px;
            margin-bottom: 20px;
            background-size: cover;
            
        }


        .profile-content {
            padding: 20px;
        }

        .profile-content h2 {
            margin-bottom: 15px;
        }

        .profile-content p {
            margin-bottom: 10px;
            font-size: 16px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
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
        }
        .custom-section {
            background-color:#fff6f0; /* Light gray background */
            padding: 20px;
            display: flex;
          flex-direction: row;

        }

        /* Content Row */
.content-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
        /* Left Sidebar */
.left-sidebar {
    flex: 0 0 250px;
    padding: 20px;
    
    background-color: #f8f9fa; /* Light gray background */
    border-radius: 30px;
    margin-right: 20px; /* Spacing between sidebar and main content */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow for the sidebar */
    width: 200px;
}

.link-container {
    display: flex;
    flex-direction: column;
   height: 20px;
}

.link-container a {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    text-decoration: none;
    color: #1e5785;
    font-size: 16px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.link-container a:hover {
    background-color: #ee930c;
    color: #1e5785;
}

.link-container i {
    margin-right: 10px;
    font-size: 22px;
}
/* Middle Card */
.middle-card {
    flex: 1;
    padding: 20px;
    background-color:#fff6f0;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-right: 20px; /* Space between middle and right sidebar */
}

/* Right Sidebar */
.right-sidebar {
    flex: 0 0 200px;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
/* Card Styling */
.card {
    padding: 15px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.card-header {
    background-color: #ee930c;; /* Light grey background for header */
    padding: 10px 15px; /* Padding for spacing */
    border-bottom: 1px solid #e0e0e0; /* Border separating header */
}
.card-header2 {
    background-color: #446d8e;; /* Light grey background for header */
    padding: 10px 15px; /* Padding for spacing */
    border-bottom: 1px solid #e0e0e0; /* Border separating header */
    border-radius: 10px;
}


.card-title {
    font-size: 1.25rem; /* Slightly larger title font */
    font-weight: 600; /* Bold font for emphasis */
    color: #343a40; /* Darker color for title */
}

.card-body {
    padding: 15px; /* Padding for content */
}

.card-text {
    font-size: 1rem; /* Standard font size */
    color: #495057; /* Dark grey color for text */
}

.card-footer {
    background-color: #f8f9fa; /* Match footer background with header */
    border-top: 1px solid #e0e0e0; /* Border separating footer */
    padding: 10px 15px; /* Padding for spacing */
}

.badge {
    font-size: 0.875rem; /* Slightly smaller badge font */
    padding: 5px 10px; /* Padding inside badge */
}

.btn-outline-primary {
    font-size: 0.875rem; /* Adjust button size */
    padding: 5px 10px; /* Padding inside button */
    border-radius: 5px; /* Rounded corners for button */
}
    </style>
</head>
<body>
<section class="custom-section">
    <div class="container">
        <div class="profile-header">
            
        </div>

        <div class="content-row">
            <div class="left-sidebar">
                <div class="link-container">
                    <a href="Alumni_dash.html"><i class="fa-solid fa-house fa-lg" style="color: #4c8fe7; margin-right:6px;"></i>Feeds</a>
                    <a href="#"><i class="fa-regular fa-folder fa-lg" style="color: #4c8fe7; margin-right:6px;"></i>Directory</a>
                    <a href="#"><i class="fa-solid fa-person-chalkboard fa-lg" style="color: #4c8fe7; margin-right:6px;"></i>Mentoring</a>
                    <a href="#"><i class="fa-solid fa-briefcase fa-lg" style="color: #4c8fe7; margin-right:6px;"></i>Jobs</a>
                    <a href="#"><i class="fa-regular fa-calendar-days fa-lg" style="color: #4c8fe7; margin-right:6px;"></i> Events</a>
                    <a href="#"><i class="fa-regular fa-image fa-lg" style="color: #4c8fe7; margin-right:6px;"></i> Photos</a>
                    <a href="#"><i class="fa-solid fa-user-group fa-lg" style="color: #4c8fe7; margin-right:6px;"></i>Groups</a>
                    <a href="#"><i class="fa-solid fa-file fa-lg" style="color: #4c8fe7; margin-right:6px;"></i>Resources</a>
                </div>
            </div>

            <div class="middle-card">
                <div class="card">
                

           
         <!-- Text link styled as a button to trigger the modal -->
              <a href="#" data-bs-toggle="modal" data-bs-target="#postModal" class="modal-trigger">What is on your mind?</a>
             
              
                </div>
                <hr>
                <div class="card">
                

           
         <!-- the feeds -->
             
             
              <div class="card-header2 d-flex align-items-center">
        <img src="path_to_profile_image.jpg" alt="User Profile" class="rounded-circle me-3" style="width: 50px; height: 50px;">
        <div>
            <h5 class="card-title mb-0">User Name</h5>
            <small class="text-muted">Time Posted: 2 hours ago</small>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title">Post Title</h5>
        <p class="card-text">This is the content of the post. It can be a few sentences long, giving a brief overview of the topic discussed.</p>
    </div>
    <div class="card-footer d-flex justify-content-between">
        <span class="badge bg-primary">Category</span>
        <button class="btn btn-outline-primary btn-sm">Read More</button>
    </div>

    
                </div>
<br>
                <div class="card">
                

           
                <!-- the feeds -->
                    
                    
                     <div class="card-header2 d-flex align-items-center">
               <img src="path_to_profile_image.jpg" alt="User Profile" class="rounded-circle me-3" style="width: 50px; height: 50px;">
               <div>
                   <h5 class="card-title mb-0">User Name</h5>
                   <small class="text-muted">Time Posted: 2 hours ago</small>
               </div>
           </div>
           <div class="card-body">
               <h5 class="card-title">Post Title</h5>
               <p class="card-text">This is the content of the post. It can be a few sentences long, giving a brief overview of the topic discussed.</p>
           </div>
           <div class="card-footer d-flex justify-content-between">
               <span class="badge bg-primary">Category</span>
               <button class="btn btn-outline-primary btn-sm">Read More</button>
           </div>
       
           
                       </div>
            </div>

            <div class="right-sidebar">
                <div class="card">
                <div class="card-header">
                     Featured
                     </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                </ul>
                </div>  <br><div class="card">
                <div class="card-header">
                     Featured
                     </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
                </ul>
                </div>

            </div>

            
        </div>
    </div>
    <?php include '../includes/modal_form.php'; ?>
</section>

<!-- Bootstrap 5 JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
