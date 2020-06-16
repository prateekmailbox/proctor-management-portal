<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if (!isset($_SESSION['email'])) {
    // $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
    $db = mysqli_connect('localhost', 'root', '', 'registration');

  $email = $_SESSION['email'];
  $name ="";
  $phone = "";
  $dob = "";
  $usn = "";
  $blood = "";
  $father = "";
  $foccup = "";
  $faddr = "";
  $fphone = "";
  $mother = "";
  $moccup = "";
  $maddr = "";
  $mphone = "";
  $guardian = "";
  $goccup = "";
  $gaddr = "";
  $gphone = "";
  $proctor="";
  $proctors = array();

  $query = "SELECT * FROM profile_student WHERE email='$email'";
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);
    if (mysqli_num_rows($results) == 1) {
        $email = $user['email'];
        $name =$user['name'];
        $phone = $user['phone'];
        $dob = $user['dob'];
        $usn = $user['usn'];
        $blood = $user['blood'];
        $father = $user['father'];
        $foccup = $user['foccup'];
        $faddr = $user['faddr'];
        $fphone = $user['fphone'];
        $mother = $user['mother'];
        $moccup = $user['moccup'];
        $maddr = $user['maddr'];
        $mphone = $user['mphone'];
        $guardian = $user['guardian'];
        $goccup = $user['goccup'];
        $gaddr = $user['gaddr'];
        $gphone = $user['gphone'];
        $proctor = $user["proctor"];

    }



  if (isset($_POST['save_student'])) {


        $name =mysqli_real_escape_string($db, $_POST['name']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $dob = mysqli_real_escape_string($db, $_POST['dob']);
        $usn = mysqli_real_escape_string($db, $_POST['usn']);
        $blood = mysqli_real_escape_string($db, $_POST['blood']);
        $father = mysqli_real_escape_string($db, $_POST['father']);
        $foccup = mysqli_real_escape_string($db, $_POST['foccup']);
        $faddr = mysqli_real_escape_string($db, $_POST['faddr']);
        $fphone = mysqli_real_escape_string($db, $_POST['fphone']);
        $mother = mysqli_real_escape_string($db, $_POST['mother']);
        $moccup = mysqli_real_escape_string($db, $_POST['moccup']);
        $maddr = mysqli_real_escape_string($db, $_POST['maddr']);
        $mphone = mysqli_real_escape_string($db, $_POST['mphone']);
        $guardian = mysqli_real_escape_string($db, $_POST['guardian']);
        $goccup = mysqli_real_escape_string($db, $_POST['goccup']);
        $gaddr = mysqli_real_escape_string($db, $_POST['gaddr']);
        $gphone = mysqli_real_escape_string($db, $_POST['gphone']);
        $proctor = mysqli_real_escape_string($db, $_POST['proctor']);


   $query = "SELECT * FROM profile_student WHERE email='$email'";
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);
    if (mysqli_num_rows($results) == 1) {
$query = "UPDATE profile_student SET email = '$email',name ='$name',phone = '$phone',dob = '$dob', usn='$usn', blood = '$blood',father = '$father',foccup = '$foccup',faddr = '$faddr',fphone = '$fphone',mother = '$mother',moccup = '$moccup',maddr = '$maddr',mphone = '$mphone',guardian = '$guardian',goccup = '$goccup',gaddr = '$gaddr',gphone = '$gphone', proctor = '$proctor' WHERE email='$email'";
    }else{
      //echo "<script>alert('hi')</script>";
      $query = "INSERT INTO profile_student ( email, name,  phone,  dob,  usn, blood,  father,  foccup,  faddr,  fphone,  mother,  moccup,  maddr,  mphone,  guardian,  goccup,  gaddr,  gphone, proctor) VALUES( '$email', '$name',  '$phone',  '$dob', '$usn',  '$blood',  '$father',  '$foccup',  '$faddr',  '$fphone',  '$mother',  '$moccup',  '$maddr',  '$mphone',  '$guardian',  '$goccup',  '$gaddr',  '$gphone', '$proctor')";
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
                        <br/><br/>

                        <nav class="tabs is-boxed is-fullwidth is-medium">
                                <div class="container">
                                  <ul>
                                    <li class="tab is-active" onclick="openTab(event,'Personal')"><a>Personal</a></li>
                                    <li class="tab" onclick="openTab(event,'Father')"><a >Father</a></li>
                                    <li class="tab" onclick="openTab(event,'Mother')"><a >Mother</a></li>
                                    <li class="tab" onclick="openTab(event,'Guardian')"><a >Guardian</a></li>

                                  </ul>
                                </div>
                              </nav>


                    <br/>

                    <div>
                       <form method="post" action="profile.php">

                            <div id="Personal" class="content-tab" >
                                            <div class="field">
                                                <label class="label">Full Name</label>
                                                <p class="control">
                                                  <input class="input" type="text" placeholder="Full Name" name="name" value="<?php echo $name; ?>">
                                                </p>
                                              </div>
                
                                              <div class="field">
                                                <label class="label">USN</label>
                                                <p class="control">
                                                  <input class="input" type="text" placeholder="USN" name="usn" value="<?php echo $usn; ?>">
                                                </p>
                                              </div>
                                              
                
                                              <div class="field">
                                                    <label class="label">Date of Birth</label>
                                                    <p class="control">
                                                      <input class="input" type="text" placeholder="Date of Birth" name="dob" value="<?php echo $dob; ?>">
                                                    </p>
                                              </div>

                              <div class="field"><div class="control">
                                    <label class="label">Proctor</label>
                                    <div class="select">
                                      <select name="proctor">
                                            <?php

                                                                                

                                            $query = "SELECT * FROM profile_proctor";
                                            $results = mysqli_query($db, $query);
                                            while ($row = mysqli_fetch_assoc($results)) {
                                              // echo $row['name'];
                                               array_push($proctors, array("email"=> $row["email"], "name" => $row["name"]));
                                            }
                                            // echo "hi";
                                                foreach($proctors as $p) {
                                                  echo $p['name'];
                                                  if($proctor == $p['email']){
                                                    echo "<option value='".$p['email']."' selected>".$p['name']." (".$p['email'].")</option>";
                                                  }else{
                                                  echo "<option value='".$p['email']."'>".$p['name']." (".$p['email'].")</option>";
                                                  }
                                                }
                                                ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>



                              <div class="field"><div class="control">
                                    <label class="label">Blood Group</label>
                                    <div class="select">
                                      <select name="blood">
                                            <?php
                                                $all_blood = array(
                                                'ap'=>'A+',
                                                'an'=>'A-',
                                                'bp'=>'B+',
                                                'bn'=>'B-',
                                                'op'=>'O+',
                                                'on'=>'O-',
                                                'abp'=>'AB+',
                                                'abn'=>'AB-');
                                                foreach ($all_blood as $key => $value) {
                                                  if($blood == $key){
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
                
                                              <div class="field">
                                                    <label class="label">Phone Number</label>
                                                    <p class="control">
                                                      <input class="input" type="text" placeholder="9876543210" name="phone" value="<?php echo $phone; ?>">
                                                    </p>
                                              </div>
                                



                            </div>
                            <div id="Father" class="content-tab" style="display:none">
                                    <div class="tab-content">
                                            <div class="field">
                                                   <label class="label">Father's Name</label>
                                                   <p class="control">
                                                     <input class="input" type="text" placeholder="Father's Name" name="father" value="<?php echo $father; ?>">
                                                   </p>
                                             </div>
               
                                             <div class="field">
                                                   <label class="label">Occupation</label>
                                                   <p class="control">
                                                     <input class="input" type="text" placeholder="Occupation" name="foccup" value="<?php echo $foccup; ?>">
                                                   </p>
                                             </div>

                                             <div class="field">
                                                    <label class="label">Address</label>
                                                    <p class="control">
                                                      <input class="input" type="text" placeholder="Address" name="faddr" value="<?php echo $faddr; ?>">
                                                    </p>
                                              </div>

                                              <div class="field">
                                                    <label class="label">Phone Number</label>
                                                    <p class="control">
                                                      <input class="input" type="number" placeholder="10-Digit Number" name="fphone" value="<?php echo $fphone; ?>">
                                                    </p>
                                              </div>
                                       </div>
                            </div>
                            <div id="Mother" class="content-tab" style="display:none">
                                    <div class="tab-content">
                                            <div class="field">
                                                   <label class="label">Mother's Name</label>
                                                   <p class="control">
                                                     <input class="input" type="text" placeholder="Mother's Name" name="mother" value="<?php echo $mother; ?>">
                                                   </p>
                                             </div>
               
                                             <div class="field">
                                                   <label class="label">Occupation</label>
                                                   <p class="control">
                                                     <input class="input" type="text" placeholder="Occupation" name="moccup" value="<?php echo $moccup; ?>">
                                                   </p>
                                             </div>

                                             <div class="field">
                                                    <label class="label">Address</label>
                                                    <p class="control">
                                                      <input class="input" type="text" placeholder="Address" name="maddr" value="<?php echo $maddr; ?>">
                                                    </p>
                                              </div>

                                              <div class="field">
                                                    <label class="label">Phone Number</label>
                                                    <p class="control">
                                                      <input class="input" type="number" placeholder="10-Digit Number" name="mphone" value="<?php echo $mphone; ?>">
                                                    </p>
                                              </div>
                                       </div>
                            </div>

                            <div id="Guardian" class="content-tab" style="display:none">
                                    <div class="tab-content">
                                            <div class="field">
                                                   <label class="label">Guardian's Name</label>
                                                   <p class="control">
                                                     <input class="input" type="text" placeholder="Guardian's Name" name="guardian" value="<?php echo $guardian; ?>">
                                                   </p>
                                             </div>
               
                                             <div class="field">
                                                   <label class="label">Occupation</label>
                                                   <p class="control">
                                                     <input class="input" type="text" placeholder="Occupation" name="goccup" value="<?php echo $goccup; ?>">
                                                   </p>
                                             </div>

                                             <div class="field">
                                                    <label class="label">Address</label>
                                                    <p class="control">
                                                      <input class="input" type="text" placeholder="Address" name="gaddr" value="<?php echo $gaddr; ?>">
                                                    </p>
                                              </div>

                                              <div class="field">
                                                    <label class="label">Phone Number</label>
                                                    <p class="control">
                                                      <input class="input" type="number" placeholder="10-Digit Number" name="gphone" value="<?php echo $gphone; ?>">
                                                    </p>
                                              </div>
                                       </div>
                            </div>

                            <br/>
                                 <div class="field is-grouped">
                                    <div class="control">
                                      <input type="submit" class="button is-primary" name="save_student" value="Save" />
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
        </div>
      </section>

     <script type="text/javascript">
       
       function openTab(evt, tabName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("content-tab");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tab");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" is-active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " is-active";
}
     </script>
</body>
</html>