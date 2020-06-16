

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <title>Login</title>
    <script type="text/javascript">
        function login_valid(){
           var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
           var email = document.getElementById('email').value;
           var pass = document.getElementById('pass').value;

                  if (!email) 
                  {
                      putError("Email is required");
                      return false;
                  }
                         if (!reg.test(email)) 
                  {
                      putError("Invalid email address");
                      return false;
                  }
                  if (!pass) 
                  {
                      putError("Password is required");
                      return false;
                  }

           

                  return true;
        }

        function putError(str){
            document.getElementById('errors').innerHTML = "<div class='notification is-danger'>" + str + "</div>";
        }
    </script>

</head>
<body>
    <section class="hero is-white is-fullheight">
        <div class="hero-body">
          <div class="container">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                        <h1 class="has-text-centered is-size-3 has-text-weight-bold">Login</h1>
                        <div id="errors"></div>
                        <br/>
                        <form method="post" action="login.php" onsubmit="return(login_valid())">
                            <div class="field">
                                <p class="control has-icons-left">
                                  <input class="input" type="text" placeholder="Email" id="email" name="email">
                                  <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                  </span>
                                </p>
                              </div>
                              <div class="field">
                                <p class="control has-icons-left">
                                  <input class="input" type="password" placeholder="Password" id="pass" name="pass">
                                  <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                  </span>
                                </p>
                              </div>
                              <div class="field">
                                <p class="control">
                                  <input type="submit" class="button is-link" value="Login" name="login_user"/>
                                </p>
                              </div>
                            </form>
                            <br/>
                            <p>Not a member? <a href="register.php" class="has-text-primary">Register now</a>.</p>
                </div>
            </div>
           
          </div>
        </div>
      </section>

      <?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pass = mysqli_real_escape_string($db, $_POST['pass']);

  // if (empty($email)) {
  //   array_push($errors, "Email is required");
  // }
  // if (empty($password)) {
  //   array_push($errors, "Password is required");
  // }


    $pass = md5($pass);
    $query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['email'] = $email;
      $_SESSION['type'] = $user['type'];
     // $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
       echo "<script>putError('Wrong username/password combination');</script>";
     // array_push($errors, "Wrong username/password combination");
    }
}

?>
</body>
</html>