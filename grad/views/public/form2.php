<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <script src="https://kit.fontawesome.com/49d89f7fa2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/home2.css">
      <style>
        
        .custom-section {
            background-color:#fff6f0; /* Light gray background */
            padding: 20px;
        }
        .h7 {
            font-size: 0.8rem;
        }

        .gedf-wrapper {
            margin-top: 0.97rem;
        }

        @media (min-width: 992px) {
            .gedf-main {
                padding-left: 4rem;
                padding-right: 4rem;
            }
            .gedf-card {
                margin-bottom: 2.77rem;
            }
        }


 
      </style>
    </head>

    <body>
    <?php include '../includes/nav.php'; ?>

    <section class="custom-section">

    <div class="container mt-5">
  <div class="row">
    <!-- Left Side Card with Tabs -->
    <div class="col-md-8">
      <div class="card">
      <img src="../img/pic1.jpg" class="logo-img" style="max-width: 100%; height:20rem;">
        <div class="card-body">
          <h5 class="card-title">Card Title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">My Posts</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">About</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">Connections</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-controls="tab4" aria-selected="false">Media</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab5-tab" data-bs-toggle="tab" data-bs-target="#tab5" type="button" role="tab" aria-controls="tab5" aria-selected="false">Events</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
    <!--tab1 here-->
          <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">Content for Tab 1
             <!--- \\\\\\\Postcad-->
             <div class="card gedf-card">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="posts-tab" data-bs-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make a Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="false">Images</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
        <div class="form-group">
          <label class="sr-only" for="message">post</label>
         <!-- Text link styled as a button to trigger the modal -->
  <a href="#" data-bs-toggle="modal" data-bs-target="#postModal" class="modal-trigger">What is on your mind?</a>
        </div>
      </div>
      <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
        <div class="form-group">
          <div class="custom-file">
            
            <label class="custom-file-label" for="customFile">Upload image</label>
            <a href="default.asp"><i class="fa-solid fa-image"></i></a>
          </div>
        </div>
        <div class="py-4"></div>
      </div>
    </div>
    <div class="btn-toolbar justify-content-between">
      <div class="btn-group">
      <?php include '../includes/modal_form.php'; ?>
      
     
    </div>
  </div>
</div>

           <!--- \\\\\\\Post-->
           <div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">@LeeCross</div>
                                    <div class="h7 text-muted">Miracles Lee Cross</div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                   
                                    
                                    <div class="dropdown">
                                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                     </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <a class="dropdown-item" href="#">Save</a>
                                        <a class="dropdown-item" href="#">Hide</a>
                                        <a class="dropdown-item" href="#">Report</a>
                                     </ul>
                                </div>
                        
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>10 min ago</div>
                        <a class="card-link" href="#">
                            <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur adip.</h5>
                        </a>

                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor
                            sequi fuga quia quaerat cum, obcaecati hic, molestias minima iste voluptates.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                    </div>
                </div>
                <!-- Post /////-->
          </div>
           <!--tab1 here-->

            <!--tab2 here-->
          <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">Content for Tab 2
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
           <!--tab2 ends here-->
            <!--tab3 here-->
          <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">Content for Tab 3

          
          </div>
           <!--tab3 ends here-->
            <!--tab4 here-->
          <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">Content for Tab 4</div>
           <!--tab4 ends here-->
            <!--tab5 here-->
          <div class="tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab5-tab">Content for Tab 5</div>
           <!--tab5 here-->
        </div>
      </div>
    </div>
    <!-- Right Side Card -->
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Right Side Card Header
        </div>
        <div class="card-body">
          <h5 class="card-title">Right Side Card Title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</div>

    </section>

    <?php include '../includes/footer.php'; ?>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

