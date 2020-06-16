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


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <title>Proctees</title>
            <script type="text/javascript">
      



function openModalp(){
    modal = document.getElementById("modalp");
    modal.classList.add("is-active");
}

function closeModalp(){
    modal = document.getElementById("modalp");
    modal.classList.remove("is-active");
}



function openModala(){
    modal = document.getElementById("modala");
    modal.classList.add("is-active");
}

function closeModala(){
    modal = document.getElementById("modala");
    modal.classList.remove("is-active");
}

</script>
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


        <section class="hero is-white is-fullheight" style="margin-top: -200px;">
                <div class="hero-body">
                  <div class="container">
                        <h1 class="has-text-centered is-size-3 has-text-weight-bold">Students Under You</h1>
                        <br/><br/>
                        <br/>


                                      <table class="table" style="width:100%;">
                                        <thead>
                                          <tr>
                                          <th>Student Name</th>
                                          <th>USN</th>
                                          <th>Email</th>
                                          <th>Profile</th>
                                          <th>Academic Performance</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                          <?php
                                                      $query = "SELECT * from profile_student WHERE proctor='".$_SESSION['email']."'";


                                                           $results = mysqli_query($db, $query);

                                                          while ($row = mysqli_fetch_assoc($results)) {

                                                              echo "<tr><td>".$row['name']."</td><td>".$row['usn']."</td><td>".$row['email']."</td><td><a class='button is-small is-warning' href='proctees.php?p=".$row['email']."'>Profile</a></td><td><a class='button is-small is-success' href='proctees.php?a=".$row['email']."'>Academic Performance</a></td></tr>";

                                                          }


                                          ?>
                              
                                        </tbody>
                                      </table>

                        
    

                  <div class="modal" id="modalp">
                    <div class="modal-background"></div>
                    <div class="modal-card">
                    <header class="modal-card-head">
                    <p class="modal-card-title">Student details</p>
                    <button class="delete" aria-label="close" onclick="closeModalp();"></button>
                    </header>
            <section class="modal-card-body">
<?php


if(isset($_GET['p'])){

      $query = "SELECT * from profile_student WHERE email='".$_GET['p']."'";


     $results = mysqli_query($db, $query);

  while ($row = mysqli_fetch_assoc($results)) {
      echo "<div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Full Name:</div>
        <div class='column is-4'>" .$row['name']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Email</div>
        <div class='column is-4'>" .$row['email']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>USN:</div>
        <div class='column is-4'>" .$row['usn']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>DOB:</div>
        <div class='column is-4'>" .$row['dob']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Blood Group:</div>
        <div class='column is-4'>" .$row['blood']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Phone Number:</div>
        <div class='column is-4'>" .$row['phone']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Father Name:</div>
        <div class='column is-4'>" .$row['father']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Father Occupation:</div>
        <div class='column is-4'>" .$row['foccup']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Father Address:</div>
        <div class='column is-4'>" .$row['faddr']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Father Phone:</div>
        <div class='column is-4'>" .$row['fphone']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Mother Name:</div>
        <div class='column is-4'>" .$row['mother']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Mother Occupation:</div>
        <div class='column is-4'>" .$row['moccup']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Mother Address:</div>
        <div class='column is-4'>" .$row['maddr']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Mother Phone:</div>
        <div class='column is-4'>" .$row['mphone']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Guardian Name:</div>
        <div class='column is-4'>" .$row['guardian']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Guardian Occupation:</div>
        <div class='column is-4'>" .$row['goccup']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Guardian Address:</div>
        <div class='column is-4'>" .$row['gaddr']. "</div>
      </div>
      <div class='columns is-centered'>
        <div class='column is-4 has-text-weight-bold'>Guardian Phone:</div>
        <div class='column is-4'>" .$row['gphone']. "</div>
      </div>
      ";

  }
      echo "<script>openModalp();</script/>";


}




?>
    </section>
    <footer class="modal-card-foot">
      <button class="button" onclick="closeModalp();">Go Back</button>
    </footer>
  </div>
</div>


    <div class="modal" id="modala">
        <div class="modal-background"></div>
        <div class="modal-card"  style="width: 900px;">
            <header class="modal-card-head">
            <p class="modal-card-title">Academic Performance</p>
            <button class="delete" aria-label="close" onclick="closeModala();"></button>
            </header>
            <section class="modal-card-body">
<?php


if(isset($_GET['a'])){

      $query = "SELECT * from sem_record WHERE email='".$_GET['a']."' AND sent='y'";


     $results = mysqli_query($db, $query);


  while ($row = mysqli_fetch_assoc($results)) {
    $signed =  $row['signed'];
      echo "
        <div class='columns'>
            <div class='column'><span class='has-text-weight-bold'>Semester:</span> ".$row['sem']."</div>
            <div class='column'><span class='has-text-weight-bold'>Academic Year:</span> ".$row['ayr']."</div>
        </div>
      ";



      $query = "SELECT * from academic_record WHERE sem_id='".$row['id']."'";


     $result = mysqli_query($db, $query);

        echo"<table class='table'>
                <thead>
                    <th>Course Title</th>
                    <th>Course Code</th>
                    <th>Credits</th>
                    <th>Attendance</th>
                    <th>CIE</th>
                    <th>SEE</th>
                </thead>
                <tbody>";

     while ($r = mysqli_fetch_assoc($result)) {
      echo "
                <tr>
                    <td>".$r['cti']."</td>
                    <td>".$r['ccd']."</td>
                    <td>".$r['cre']."</td>
                    <td>".$r['atd']."</td>
                    <td>".$r['cie']."</td>
                    <td>".$r['see']."</td>
                </tr>
      ";
     }
     echo "</tbody>";
     echo "</table>";
     if($signed == 'n'){
     echo "<a style='margin-right: 30px;' class='button is-warning is-pulled-right' href='proctees.php?s=".$row['id']."&email=".$_GET['a']."'><i class='fas fa-pen' style='margin-right: 5px; font-size: 85%;'></i>Sign</a><br/>";
     }
   
    echo "<hr/>";

      echo "<script>openModala();</script/>";


}

}

if(isset($_GET['s'])){
$query = "UPDATE sem_record SET signed='y' WHERE id='".$_GET['s']."'";


    mysqli_query($db, $query);

// header("Location: /proctees.php?a=".$_GET['email']);

}




?>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success">Save changes</button>
      <button class="button" onclick="closeModala();">Go Back</button>
    </footer>
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