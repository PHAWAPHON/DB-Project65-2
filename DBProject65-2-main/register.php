<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

 

    <style>
        html,
        .banner {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgb(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(Img/hd-wallpaper.jpg);
            background-size: cover;
            background-position: center;
        }

        .container2 {
            margin-top: 100px;
        }

        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="username"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body>
    <div class="banner">
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
            <div class="container">
                <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                    <img src="assets/images/DD5.png" height="40px">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">หน้าหลัก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Sign_up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container2">
            <main class="form-signin">
                <form action="user_reg.php" method="POST">
                    <h1 class="mb-3 text-center text-white">Sign Up</h1>

                    <div class="form-floating">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <label for="floatingInput">username</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                        <label for="floatingPassword">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" name="register" type="submit">Sign Up</button>
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2023</p>
                    <p class="text-muted text-center">มีสมาชิกแล้วก็Sign in เลยสิจ้ะ? <a href="login.php">Sign In</a>
                    </p>
                </form>
                <hr>
                <a class="btn btn-secondary" href="index.php"><i class="bi bi-arrow-left"></i> Go back</a>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

</body>

</html>