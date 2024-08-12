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
        <script src="/resources/js/main.js"></script>
    </head>

    <body class="register-page">
        <header id="header" class="header d-flex align-items-center sticky-top">
            <!-- navbar  -->
        
            <div class="container-fluid container-xl position-relative d-flex align-items-center">
                <a href="index.html" class="logo d-flex align-items-center me-auto">
                    <img src="../views/img/logo.png">
                </a>
        
               
            </div>
        </header>

        <main>
             <!-- register form -->
             
        
          <div class="container-fluid form-box-register">
          <h2 class="text-center mb-4"> Please sign in...</h2>
            <div class="form-container" tab>
                <h2 class="text-center mb-4">Sign-in</h2>
                <form id="regForm" action="../controller/Alumni/login.php" method="POST">
    <!-- stage 1  -->
    <div class="stage-form" id="stage1">
    

        <!-- row 1  -->
    

        <!-- row 2 -->
        <div class="row g-3 row2">
            <div class="input-box">
                <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
                <label for="email" class="form-label">Email</label>
            </div>

        <!-- row 5 -->
        <div class="row g-3 row2">
            <div class="input-box">
                <input type="password" class="form-control" id="password" name="password" autocomplete="new-password" placeholder="Enter your password" required>
                <label for="password" class="form-label"></label>
            </div>
      
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>



            </div>
        </div>

        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
         <!--i could not link javascript to html file, so i wrote it in here-->
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
