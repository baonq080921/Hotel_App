<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <title>VinPearl Hotel APP</title>
</head>
<body>
    <!--  carousel -->
    <section id="carouselExampleControls" class="carousel slide carousel_section" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="carousel-image" src="./image/hotel1.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hotel1.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hotel1.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hotel1.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hotel1.jpg">
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
        </div>
    </section>
    <!-- main section -->
    <section id="auth_section">
        
        <div class="logo">
            <img  class="vinpearlogo" src="./image/vinpearlogo-removebg-preview.png" alt="logo">
            <p>VINPEARL</p>
        </div>

        <div class="auth_container">
            <!-- =============== Login ==================== -->

            <div id ="Log_in">
                <h2>Log In</h2>
                <div class="role_btn">
                <div class="btns active">User</div>
                <div class="btns">Staff</div>
            </div>
            <form action="" class="user_login authsection active" id="userlogin" method="post">
                <div class="form-floating">
                    <input type="text" name="Username" placeholder=" " class="form-control"  autocomplete="off">
                    <label for="Username">UserName</label>
                </div>
                <div class="form-floating">
                    <input type="email" name="Email" placeholder=" " class="form-control" autocomplete="off" require>
                    <label for=Email">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="Password" placeholder=" " class="form-control"  autocomplete="off" require>
                    <label for="Password">Password</label>
                </div>
                <button type="submit" name="user_login_submit" class="auth_btn">Log in</button>

                <div class="footer_line">
                    <h6>Dont't have an account! <span class="page_move_btn" onclick="signuppage()">sign ups</span></h6>
                </div>
            </form>

            <!-- Employee Login -->

            <form  class="employee_login authsection " id="employeelogin" action="" method="post">
                <div class="form-floating">
                    <input type="email" class="form-control" name="Emp_Email" placeholder=" ">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="Emp_Password" placeholder=" ">
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" name="Emp_login_submit" class="auth_btn">Log in</button>
            </form>
            </div>


        <div id = "sign_up">
            <h2> Sign Up</h2>

            <form action="" class="user_signup" id="usersignup" method="post">
            <div class="form-floating">
                    <input type="text" class="form-control" name="Username" placeholder=" ">
                    <label for="Username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" name="Email" placeholder=" ">
                    <label for="Email">Email</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="Password" class="form-control" placeholder=" " >
                    <label for="Password">Password</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="CPassword" class="form-control" placeholder=" ">
                    <label for="CPassword">Confirm Password</label>
                </div>
                
                <button type="submit" name="user_signup_submit" class="auth_btn">Sign up </button>

                <div class="footer_line">
                    <h6>Already have an account? <span class="page_move_btn" onclick="loginpage()">Log in</span></h6>
                </div>
            </form>
        </div>
    </div>
    </section>
</body>
<script src="./javascript/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
