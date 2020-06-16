


<?php 
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

  if (!isset($_SESSION['email'])) {
    // $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="styles.css">

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
      integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP"
      crossorigin="anonymous"
    />
    <title>Proctor Management System</title>
  </head>
  <body>
    <section class="hero is-fullheight is-info is-bold">
    <div class="hero-head">
    <header class="navbar" style="margin-top: 30px;">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item has-text-weight-bold">
            PROCTOR MANAGEMENT SYSTEM
          </a>
          <span class="navbar-burger burger" data-target="navbarMenuHeroC">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </div>
        <div id="navbarMenuHeroC" class="navbar-menu">
          <div class="navbar-end">
            <span class="navbar-item">
              <a class="button is-dark is-inverted" href="index.php?logout">
                <span class="icon">
                  <i class="fas fa-user"></i>
                </span>
                <span>Logout</span>
              </a>
            </span>
          </div>
        </div>
      </div>
    </header>
  </div>


      <div class="hero-body">
        <div class="container has-text-centered">
          <h1 class="title">Dashboard</h1>
          <h2 class="subtitle">Welcome, <?php echo $_SESSION['email']; ?>       </h2>
           <br/> 

          <div class="columns">
            <div class="column is-6">
              <div class="field is-grouped is-pulled-right">
                <div class="control">
                  <a href="profile.php" class="button is-warning has-text-dark">
                    Edit Profile
                  </a>
                </div>
              </div>
            </div>

            <div class="column is-6">
                    <div class="field is-grouped">
                      <div class="control">

                        <?php 
                        if($_SESSION['type'] == 'student'){
                          echo "<a href='academic_record.php' class='button is-outlined is-warning has-text-white'>
                                Academic Record
                              </a>";
                        }elseif($_SESSION['type'] == 'proctor'){
                          echo "<a href='proctees.php' class='button is-outlined is-warning has-text-white'>
                                Proctees
                              </a>";
                        }
                            ?>
                       </div>
                      
                    </div>
                  </div>

          </div>
        </div>
      </div>
    </section>
  </body>
</html>
