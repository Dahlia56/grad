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
        <link rel="stylesheet" href="../views/css/login.css">
    </head>

    <body>
        


        
    <section class="myform-area">
    <div class="container-fluid container-xl ">
                  <div class="row justify-content-center">
                      <div class="col-lg-8">
                          <div class="form-area login-form">
                              <div class="form-content">
                              <img src="../views/img/logo.png" width="350">
                           <br>
                           <br>
                           <br>
                           <br>
                           <br>
                           <br>
                           <br>
                           <br>
                           <h2 class="text-white"></h2>
                             <h8 class="text-white"> Please Login here....</h8>
                                  <ul>
                                      
                                  </ul>

                              </div>
                              <div class="form-input">
                                  <h2>Login Form</h2>
                                  <form  action="../controller/Alumni/login.php" method="POST">
                                      <div class="form-group">
                                      <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
                                      <label for="email" class="form-label">Email</label>
                                      </div>
                                      <div class="form-group">
                                      <input type="password" class="form-control" id="password" name="password" autocomplete="new-password" placeholder="Enter your password" required>
                                      <label for="password" class="form-label"></label>
                                      </div>
                                      <div class="myform-button">
                                          <button class="myform-btn">Login</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
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
