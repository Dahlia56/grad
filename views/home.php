
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
        <link rel="stylesheet" href="../views/css/home2.css">
    </head>

    <body class="index-page">
        <header id="header" class="header d-flex align-items-center sticky-top">
          <a href="home.php" class="logo d-flex align-items-center me-auto">
            <img src="../views/img/logo.png" class="logo-img">
        </a>
            <!-- navbar  -->
            <div class="container-fluid container-xl position-relative d-flex align-items-center">
                <nav id="navmenu" class="navmenu navbar navbar-expand-sm">
                  
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a href="home.php" class="nav-link active">Home</a></li>
                            <li class="nav-item"><a href="#b1" class="nav-link">About</a></li>
                            <li class="nav-item"><a href="#b2" class="nav-link">Events</a></li>
                            <li class="nav-item"><a href="#b3" class="nav-link">Contact</a></li>
                            <li class="nav-item">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
                                    LOGIN
                                </button>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <main class="main">



            <!--  first Section -->
            <section id="first" class="first section">
        
              <img src="../views/img/sAcademic.jpg" alt="" data-aos="fade-in">
        
              <div class="container">
                <h2 data-aos="fade-up" data-aos-delay="100" class="">Welcome to<br>the UMP Alumni Connect</h2>
                <p data-aos="fade-up" data-aos-delay="200">Unleash the Power of Connection - Where Memories Meet the Future!</p>
                <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                  <a href="#" class="btn-get-started" data-bs-toggle="modal" data-bs-target="#Modal">Get Started</a>
                 
                </div>
              </div>
        
            </section><!-- /first Section -->


            <!-- About Section -->
    <section id="about" class="about section">

      <div  class="container">

        <div class="row gy-4">

          <div id="b1" class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="../views/img/sGraduation3.png" class="img-fluid border-image" alt="">
          </div>

          <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            <h3 >About Us</h3>
            <p class="fst-italic">
              Welcome to GradConnect, the ultimate hub for University  of Mpumalanga alumni to reignite old friendships and forge  new connections.

              Our mission is to create a vibrant social networking  platform where alumni can share experiences, mentorship, and opportunities. 
             Join us in building a strong community that celebrates the  past and shapes the future together!.
            </p>
           
            <a href="#" class="read-more" class="btn-get-started" data-bs-toggle="modal" data-bs-target="#Modal"><span>Join Us</span><i class="bi bi-arrow-right"></i></a>
          </div>

        </div>

      </div>

   
    </section><!-- /About Section -->

 <!-- Section Title -->
 <div class="container section-title" data-aos="fade-up">
       <h2 id="b2">News</h2>
       <p class="">Recent News</p>
     </div><!-- End Section Title -->
    <!-- News Section -->
    <section id="News" class="section News">

     <div class="container">

       <div class="row gy-4">

       <?php include '../controller/Alumni/news.php'; ?>

       </div>

     </div>

   </section><!-- /News Section -->


    <!-- Features Section -->
    <section id="features" class="features section">

     <div class="container">
      <h3>GradConnect offers</h3>

       <div class="row gy-4">

   

      

         <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
           <div class="features-item">
             <i class="bi bi-x-diamond" style="color: #11dbcf;"></i>
             <h3><a href="" class="stretched-link">Networking Opportunities:</a></h3>
           </div>
         </div><!-- End Feature Item -->

         <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
           <div class="features-item">
             <i class="bi bi-camera-video" style="color: #4233ff;"></i>
             <h3><a href="" class="stretched-link">Career Development:</a></h3>
           </div>
         </div><!-- End Feature Item -->

         <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
           <div class="features-item">
             <i class="bi bi-command" style="color: #b2904f;"></i>
             <h3><a href="" class="stretched-link">Events and Reunions</a></h3>
           </div>
         </div><!-- End Feature Item -->

         <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
           <div class="features-item">
             <i class="bi bi-dribbble" style="color: #b20969;"></i>
             <h3><a href="" class="stretched-link">News and Updates</a></h3>
           </div>
         </div><!-- End Feature Item -->

       </div>

     </div>

   </section><!-- /Features Section -->


   <!-- Events Section -->
   <section id="events" class="events section">

     <!-- Section Title -->
     <div class="container section-title" data-aos="fade-up">
       <h2 id="b2">Events</h2>
       <p class="">Upcoming Events</p>
     </div><!-- End Section Title -->

     <div class="container">

       <div class="row">

       <?php include '../controller/Alumni/events.php'; ?>
       </div>

     </div>

   </section><!-- /events Section -->


               
          <!-- Modal -->
          <section id="modal-form " class="modal-form section">
           <div class="modal " id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
             <div class="modal-dialog">
               <div class="modal-content">
                 
                  
                   <div class="myform bg-light">
                       
                       </div>

                        <!-- form -->
                        <div class="wrapper">
                         <div class="form-box login">
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           <h2>Login</h2>
                           <form action="../controller/Alumni/login.php" method="POST">
                             <div class="input-box">
                               <span class="icon"><ion-icon name="mail"></ion-icon></span>
                               <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
                               <label>Email</label>
                             </div>
                             <div class="input-box">
                               <i class="bi bi-lock-fill"></i>
                               <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" required>
                               <label>Password</label>
                             </div>
                             <div class="remember-forgot">
                               <label><input type="checkbox"> Remember me</label>
                               <a href="#">Forgot Password?</a>
                             </div>
                             <button type="submit" class="btn">Login</button>
                             <div class="login-register">
                               <p>Don't have an account?<a href="../views/register.php   " class="register-link"> Register</a></p>
                             </div>
                           </form>

                        <!-- /form -->
                   </div>
                 </div>
              
             </div> 
           </div>
           </section>

       </main>

       <!--footer-->
       <footer id="footer" class="footer position-relative">

           <div class="container footer-top">
             <div class="row gy-4">
               <div class="col-lg-4 col-md-6 footer-about">
                 <a href="index.html" class="logo d-flex align-items-center">
                   <span class="sitename"><img src="../views/img/logo.png" alt=""></span>
                 </a>
                 <div class="footer-contact pt-3">
                   <h5>Mbombela Campus</h5>
                   <p>Cnr R40 and D725 Roads</p>
                    <p>Mbombela 1200</p><br>
                    
                   <p id="b3" class="mt-3"><strong>Phone:</strong> <span>06734567842</span></p>
                   <p><strong>Email:</strong> <span>GradConnect@ump.ac.za</span></p>
                 </div>
               </div>
       
               <div class="col-lg-2 col-md-3 footer-links">
                 <h4>Useful Links</h4>
                 <ul>
                   <li><a href="#index.html">Home</a></li>
                   <li><a href="#">About us</a></li>
                   <li><a href="#">Services</a></li>
                   <li><a href="#">Terms of service</a></li>
                   <li><a href="#">Privacy policy</a></li>
                 </ul>
               </div>
       
              
       
               <div class="col-lg-4 col-md-12 footer-newsletter">
                 <h4>Our Newsletter</h4>
                 <p>Subscribe to our newsletter and receive the latest news about the University of Mpumalanga</p>
                 <form action="forms/newsletter.php" method="post" class="php-email-form">
                   <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
                   <div class="loading">Loading</div>
                   <div class="error-message"></div>
                   <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                 </form>
               </div>
       
             </div>
           </div>
       
           <div class="container copyright text-center mt-4">
             <p>© <span>Copyright</span> <strong class="px-1 sitename">Ump Alumni Connect</strong> <span>All Rights Reserved</span></p>
             <div class="credits">
              
               Designed by <a href="#">GradConnect</a>
             </div>
           </div>
       
         </footer>

           <!-- Scroll Top -->
 <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
