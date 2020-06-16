<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
  if (!isset($_SESSION['email'])) {
    header('location: login.php');
  }
    $db = mysqli_connect('localhost', 'root', '', 'registration');

  $email = $_SESSION['email'];
  $name ="";
  $dept = "";
  $off_addr = "";
  $phone = "";
  $desig = "";

  $query = "SELECT * FROM profile_proctor WHERE email='$email'";
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);
    if (mysqli_num_rows($results) == 1) {
        $email = $user['email'];
        $name =$user['name'];
      $dept = $user['dept'];
      $off_addr = $user['off_addr'];
      $phone = $user['phone'];
      $desig = $user['desig'];
    }



  if (isset($_POST['save_proctor'])) {


  $name = mysqli_real_escape_string($db, $_POST['name']);
  $dept = mysqli_real_escape_string($db, $_POST['dept']);
  $off_addr = mysqli_real_escape_string($db, $_POST['off_addr']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $desig = mysqli_real_escape_string($db, $_POST['desig']);


   $query = "SELECT * FROM profile_proctor WHERE email='$email'";
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);
    if (mysqli_num_rows($results) == 1) {
$query = "UPDATE profile_proctor SET name='$name', email='$email', off_addr='$off_addr', phone='$phone', dept='$dept', desig='$desig' WHERE email='$email'";
    }else{
      $query = "INSERT INTO profile_proctor (name, email, off_addr, phone, dept, desig) 
          VALUES('$name', '$email', '$off_addr', '$phone', '$dept', '$desig')";
    }
    mysqli_query($db, $query);
  }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <title>Profile</title>



</head>
<body>


<nav class="navbar is-link">
  <div class="navbar-brand">
    <a class="navbar-item" href="#" class="has-text-weight-bold">
      <strong>Proctor Management System</strong>
    </a>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu" style="margin:20px;">
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          <p class="control">
            <a class="button" href="index.php">
              <span class="icon">
                <i class="fas fa-arrow-left"></i>
              </span>
              <span>Go to Dashboard</span>
            </a>
          </p>
          <p class="control">
            <a class="button is-warning" href="index.php?logout">
              <span class="icon">
                <i class="fas fa-user"></i>
              </span>
              <span>Logout</span>
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</nav>

    <section class="hero is-white is-fullheight">
        <div class="hero-body">
          <div class="container">
       
            <div class="columns">
                
                <div class="column is-half is-offset-one-quarter">
                    <h1 class="has-text-centered is-size-3 has-text-weight-bold">Edit Your Profile</h1>

                    <br/>
                    <div id="errors"></div>
                        <form method="post" action="profile.php" onsubmit="return(proctorDetailsValidation())">
                                                               
                            <div class="field">
                                <label class="label">Full Name</label>
                                <p class="control">
                                  <input class="input" id="name" type="text" placeholder="Full Name" name="name" value="<?php echo $name; ?>">
                                </p>
                              </div>

                              <div class="field">
                                <label class="label">Designation</label>
                                <p class="control">
                                  <input class="input" id="designation" type="text" placeholder="Designation" name="desig" value="<?php echo $desig; ?>">
                                </p>
                              </div>

                              
                              <div class="field">
                                    <label class="label">Office Address</label>
                                    <p class="control">
                                      <input class="input" id="office" type="text" placeholder="Office Address" name="off_addr" value="<?php echo $off_addr; ?>">
                                    </p>
                              </div>    

                              <div class="field">
                                    <label class="label">Phone Number</label>
                                    <p class="control">
                                      <input class="input" id="phone" type="text" placeholder="Phone Number" name="phone" value="<?php echo $phone; ?>">
                                    </p>
                              </div> 

                              <div class="field"><div class="control">
                                    <label class="label">Department</label>
                                    <div class="select">
                                      <select name="dept">
                                            <?php
                                                $all_depts = array(
                                                'ar'=>'Architecture',
                                                'bt'=>'Bio-Technology',
                                                'ch'=>'Chemical Engineering',
                                                'ct'=>'Chemistry',
                                                'cv'=>'Civil Engineering',
                                                'ca'=>'Computer Applications',
                                                'cs'=>'Computer Science and Engineering',
                                                'ee'=>'Electrical and Elecronics',
                                                'ec'=>'Electronics and communication Engg',
                                                'im'=>'Industrial Engineering and Management',
                                                'is'=>'Information Science Engineering',
                                                'ei'=>'Electronics and Instrumentation Engineering',
                                                'mba'=>'Management Studies and Research Center',
                                                'me'=>'Mechanical Engineering',
                                                'ml'=>'Medical Electronics',
                                                'ph'=>'Physics',
                                                'te'=>'Telecommunication and Engineering',
                                                'ma'=>'Mathematics');

                                                foreach ($all_depts as $key => $value) {
                                                  if($dept == $key){
                                                    echo "<option value='$key' selected>$value</option>";
                                                  }else{
                                                  echo "<option value='$key'>$value</option>";
                                                  }
                                                }
                                                ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>
              <br/>
                              <div class="field is-grouped">
                                    <div class="control">
                                      <input type="submit" class="button is-primary" value="Save" name="save_proctor" />
                                    </div>
                                    <div class="control">
                                      <a class="button is-text" href="/">Cancel</a>
                                    </div>
                                  </div>
                            </form>

                </div>
            </div>
           
          </div>
        </div>
      </section>

<script src="profile_proctor_validation.js"></script>

</body>
</html>