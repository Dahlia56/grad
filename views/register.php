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
            <div class="form-container" tab>
                <h2 class="text-center mb-4">Register</h2>
                <form id="regForm" action="../controller/Alumni/register.php" method="POST" enctype="multipart/form-data">
    <!-- stage 1  -->
    <div class="stage-form" id="stage1">
        <div class="input-box">
            <label for="photo" class="form-label">Upload Photo</label>
            <input class="form-control" type="file" id="photo" name="photo" accept="image/*" autocomplete="off">
        </div>

        <!-- row 1  -->
        <div class="row g-3 row2">
            <div class="col-md-6 input-box">
                <input type="text" class="form-control" id="name" name="name" autocomplete="given-name" required>
                <label for="name" class="form-label">Name</label>
            </div>
            <div class="col-md-6 input-box">
                <input type="text" class="form-control" id="surname" name="surname" autocomplete="family-name" required>
                <label for="surname" class="form-label">Surname</label>
            </div>
        </div>

        <!-- row 2 -->
        <div class="row g-3 row2">
            <div class="input-box">
                <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
                <label for="email" class="form-label">Email</label>
            </div>
            <div class="input-box">
                <select class="form-select" id="category" name="category" autocomplete="off" required>
                    <option disabled selected>Choose affiliation</option>
                    <option value="1">Alumni</option>
                    <option value="2">Staff</option>
                </select>
            </div>
        </div>

        <!-- alumni fields -->
        <!-- row 3 -->
        <div class="row g-3 row2" style="display: flex;">
            <div class="input-box alumni-fields" style="display:none; flex: 1;">
                <input type="text" class="form-control" id="graduationYear" name="graduationYear" autocomplete="off" required>
                <label for="graduationYear" class="form-label">Graduation Year</label>
            </div>
            <div class="input-box alumni-fields" style="display:none; flex: 1;">
                <input type="number" class="form-control" id="studentNumber" name="studentNumber" autocomplete="off" required>
                <label for="studentNumber" class="form-label">Student Number</label>
            </div>
            <p id="error-message" style="color: red; display: none;">Student Number must be 9 digits.</p>
        </div>

        <!-- admin fields -->
        <!-- row 4 -->
        <div class="input-box admin-fields" style="display:none;">
            <input type="number" class="form-control" id="staffNumber" name="staffNumber" autocomplete="off" required>
            <label for="staffNumber" class="form-label">Staff Number</label>
        </div>
        <p id="error-message" style="color: red; display: none;">Staff Number must be 9 digits.</p>

        <!-- row 5 -->
        <div class="row g-3 row2">
            <div class="input-box">
                <input type="password" class="form-control" id="password" name="password" autocomplete="new-password" placeholder="Enter your password" required>
                <label for="password" class="form-label"></label>
            </div>
            <div class="input-box">
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" autocomplete="new-password" placeholder="Confirm your password" required>
                <label for="confirmPassword" class="form-label"></label>
            </div>
        </div>
        <div class="checkbox-container mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                <label class="form-check-label" for="terms">
                    I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>
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

        <script>
                document.addEventListener("DOMContentLoaded", function () {
      var categorySelect = document.getElementById("category");
      var alumniFields = document.querySelectorAll(".alumni-fields");
      var graduationYearInput = document.getElementById("graduationYear");
      var studentNumberInput = document.getElementById("studentNumber");
      var adminFields=document.querySelectorAll(" .admin-fields");
      var staffNumberInput=document.getElementById("staffNumber");

      categorySelect.addEventListener("change", function () {
        if (categorySelect.value === "1") { // Alumni
            alumniFields.forEach(function(field) {
                field.style.display = "block";
            });
            graduationYearInput.disabled = false;
            studentNumberInput.disabled = false;

            adminFields.forEach(function(field) {
                field.style.display = "none";
            });
            staffNumberInput.disabled = true;
        } else if (categorySelect.value === "2") { // Admin
            alumniFields.forEach(function(field) {
                field.style.display = "none";
            });
            graduationYearInput.disabled = true;
            studentNumberInput.disabled = true;

            adminFields.forEach(function(field) {
                field.style.display = "block";
            });
            staffNumberInput.disabled = false;
        } else {
            alumniFields.forEach(function(field) {
                field.style.display = "none";
            });
            graduationYearInput.disabled = true;
            studentNumberInput.disabled = true;

            adminFields.forEach(function(field) {
                field.style.display = "none";
            });
            staffNumberInput.disabled = true;
        }
    });
});
        </script>
       <script>
    document.getElementById('staffNumber').addEventListener('input', function() {
        const staffNumber = this.value;
        const errorMessage = document.getElementById('error-message');
        
        if (staffNumber.length !== 9) {
            this.setCustomValidity('Staff Number must be exactly 9 digits.');
            errorMessage.style.display = 'block';
        } else {
            this.setCustomValidity('');
            errorMessage.style.display = 'none';
        }
    });
</script>

<script>
    document.getElementById('studentNumber').addEventListener('input', function() {
        const staffNumber = this.value;
        const errorMessage = document.getElementById('error-message');
        
        if (staffNumber.length !== 9) {
            this.setCustomValidity('Student Number must be exactly 9 digits.');
            errorMessage.style.display = 'block';
        } else {
            this.setCustomValidity('');
            errorMessage.style.display = 'none';
        }
    });
</script>
    </body>
</html>
