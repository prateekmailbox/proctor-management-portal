


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <title>Register</title>

    <script type="text/javascript">
        function reg_valid(){
           var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
           var email = document.getElementById('email').value;
           var pass1 = document.getElementById('pass1').value;
           var pass2 = document.getElementById('pass2').value;

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
                  if (!pass1 || !pass2) 
                  {
                      putError("Password is required");
                      return false;
                  }
   
                  if(pass1 !== pass2){
                     putError("Passwords do not match");
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
                    <h1 class="has-text-centered is-size-3 has-text-weight-bold">Register</h1>
                    <div id="errors"></div>
                         <?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'registration');
  

if (isset($_POST['reg_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $pass1 = mysqli_real_escape_string($db, $_POST['pass1']);
  $pass2 = mysqli_real_escape_string($db, $_POST['pass2']);
  $type = mysqli_real_escape_string($db, $_POST['type']);

  //if (empty($email)) { array_push($errors, "Email is required"); }
  //if (empty($password_1)) { array_push($errors, "Password is required"); }
  //if ($password_1 != $password_2) {
  //array_push($errors, "The two passwords do not match");
  //}

  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { 
    if ($user['email'] === $email) {
      echo "<script>putError('Email already exists');</script>";
      //array_push($errors, "email already exists");
    }
  }else{
    echo "hi";
    $password = md5($pass1);

    $query = "INSERT INTO users (email, password, type) 
          VALUES('$email', '$password', '$type')";
    mysqli_query($db, $query);
    $_SESSION['email'] = $email;
    $_SESSION['type'] = $type;

    // $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
  }

}



?>
                    <br/>
                        <form method="post" action="register.php" onsubmit="return(reg_valid())">
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
                                  <input class="input" type="password" placeholder="Password" id="pass1" name="pass1">
                                  <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                  </span>
                                </p>
                              </div>
                              <div class="field">
                                    <p class="control has-icons-left">
                                      <input class="input" type="password" placeholder="Confirm Password" id="pass2" name="pass2">
                                      <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                      </span>
                                    </p>
                              </div>    
                              
                              <div class="control">
                                    <label class="radio">
                                      <input type="radio" name="type" value="student" checked>
                                      Student
                                    </label>
                                    <label class="radio">
                                      <input type="radio" name="type" value="proctor">
                                      Proctor
                                    </label>
                                </div>
                                <br/>


                              <div class="field">
                                <p class="control">
                                  <input class="button is-danger" type="submit" name="reg_user" value="Register" />
                                </p>
                              </div>

                            </form>
                            <br/>
                            <p>Already a member? <a href="login.php" class="has-text-primary">Login now</a>.</p>
                </div>
            </div>
           
          </div>
        </div>
      </section>


</body>
</html>