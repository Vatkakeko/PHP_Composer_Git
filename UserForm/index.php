<?php
session_start();


// $genderErr = $emailErr = $nameErr = $classErr = $passErr = "";
// $gender = $email = $name = $class = $pass = "";

// if ($_SERVER["REQUEST_METHOD"] = "POST") {
//   if (empty($_POST["signupusername"])) {
//     $nameErr = "Name is required";
//   } else {
//     $name = test_input($_POST["signupusername"]);
//     if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
//       $nameErr = "Only letters and white space allowed";
//     }
//   }
// }
//display
// $stmfetch = $conn->prepare("SELECT *FROM student");
// $stmfetch->execute();
// $posts = $stmfetch->fetchAll(PDO::FETCH_ASSOC);
// foreach ($posts as $post) {
//   echo $post['name'] . "<br>" . $post['email'] . "<br>";
// }

//insert

// function test_input($data)
// {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }

// 
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>


  <div class="vh-100 bg-primary">
    <div class="mt-2 mb-4 ">
      <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 mx-auto">
        <div class="col-sm-12 border border-light shadow rounded bg-light pt-10">
          <em id="signUpMsg"></em>
          <form class="needs-validation" method="post" action="detail.php" novalidate>

            <div class="mb-5 form-group">
              <label class="font-weight-bold form-label" for="validationCustom03">User Name <span class="text-danger">*</span></label>
              <input type="text" name="signupusername" id="validationCustom03" class="form-control form-control-lg" required>
              <div class="invalid-feedback">
                invalid user name
              </div>
            </div>

            <div class="form-group">
              <label class="font-weight-bold" for="validationCustom01">Email <span class="text-danger">*</span></label>
              <input type="email" name="signupemail" id="validationCustom01" class="form-control form-control-lg" placeholder="Enter valid email" required>
              <div class="invalid-feedback">
                invalid Email
              </div>

            </div>

            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
              <div class="col-sm-10">
                <div class="form-check">

                  <label class="form-check-label" for="gridRadios1">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Female" checked>
                    Female
                  </label>
                </div>
                <div class="form-check">

                  <label class="form-check-label" for="gridRadios2">
                    <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Male">
                    Male
                  </label>
                </div>


            </fieldset>

            <div class="form-group">
              <label class="font-weight-bold" for="validationCustom04">Class <span class="text-danger">*</span></label>
              <input type="text" name="userclass" id="validationCustom03" class="form-control form-control-lg" placeholder="Class" required>
            </div>


            <div class="form-group">
              <label class="font-weight-bold" for="validationCustom05">Password <span class="text-danger">*</span></label>
              <input type="password" name="signuppassword" id="validationCustom05" class="form-control form-control-lg" placeholder="*********" required>
            </div>

            <div class="form-group mt-4">
              <button type="submit" name="signupSubmit" id="signupSubmit" value="Sign Up" class="btn btn-block btn-primary"><i class="fa fa-fw fa-sign-out-alt"></i> Sign Up</button>
            </div>
          </form>
        </div>
      </div>

    </div>
    <!--/.mt-2 mb-4-->
  </div>
  <!--/.container-->





  <script>
    (function() {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
  </script>
</body>

</html>