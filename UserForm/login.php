<?php include_once 'Student.php' ?>

<?php
if (isset($_POST['login'])) {
    $user = new Student();
    $login = $user->login($_POST['loginname'], $_POST['loginpwd']);
}


?>


<html>

<head>
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <!-- ../Product/index.php -->
    <form action="" method="post" enctype="multipart/form-data">
        <section class="vh-100" style="background-color: #508bfc;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <h3 class="mb-5">Sign in</h3>

                                <div class="form-outline mb-4">
                                    <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="loginname" />
                                    <label class="form-label" for="typeEmailX-2">User Name</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="loginpwd" />
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                    <label class="form-check-label" for="form1Example3"> Remember password </label>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="login" id="login">Login</button>

                                <hr class="my-4">

                                <p class="text-danger"><?php echo @$user->error ?></p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </form>





</body>

</html>