<!DOCTYPE php>
<php lang="en">

  <head>

    <meta charset="utf-8" />
    <title>DigitalDen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--Less styles -->
    <!-- Other Less css file //different less files has different color scheam
        <link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
        <link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
        <link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
        -->
    <!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
        <script src="themes/js/less.js" type="text/javascript"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Bootstrap style -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  </head>

  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <div id="header ">
      <div class="container-fluid">
        <div id="welcomeLine" class="row">

          <?php

          session_start();

          if (isset($_GET['logout'])) {
            session_destroy();
            unset($_SESSION['username']);
          }

          ?>


          <!-- Navbar ================================================== -->


          <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
            <div class="container">
              <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <a class="nav-link" href="index.php"><img src="assets/images/DD5.png" height="40px"></a>
                <a>
                  <div style="color : white;">ยินดีต้อนรับ!

                    <?php if (isset($_SESSION['username']) && $_SESSION['username'] != null) : ?>
                      <strong><a style="color : green;">
                 
                        <?php echo $_SESSION['username']; ?>
                        </a>
                      </strong>
                      <p><a href="index.php?logout='1'" style="color : red;">Logout</a></p>
                    <?php endif ?>

                    </strong>
                  </div>
                </a>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="history.php">History
                    </a>
                  <li class="nav-item">
                    <a class="nav-link" href="product_summary.php">Cart
                    </a>

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





        </div>
      </div>
      <div class="container mt-5">

      </div>
      <div class="container mt-5">

</div>