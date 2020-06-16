<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    $db = mysqli_connect('localhost', 'root', '', 'registration');

if(isset($_GET['r'])){
    $query = "DELETE from sem_record WHERE id = '".$_GET['r']."'";
      mysqli_query($db, $query);

    $query = "DELETE from academic_record WHERE sem_id = '".$_GET['r']."'";
    mysqli_query($db, $query);

}





  if (isset($_POST['submit'])) {



    $query = "SELECT id from sem_record WHERE sem='".$_POST['sem']."' AND '".$_POST['ayr']."' AND email='".$_SESSION['email']."'";
    $results = mysqli_query($db, $query);
    $check = mysqli_fetch_assoc($results);
    if($check){


      // putError('Only one record allowed per semester.');


    $i = 0;
    $records = array();
    foreach($_POST['cti'] as $cti){
      $record = array('sem'=>$_POST['sem'], 'ayr'=>$_POST['ayr'], 'cti'=>$_POST['cti'][$i], 'ccd'=>$_POST['ccd'][$i], 'atd'=>$_POST['atd'][$i], 'cre'=>$_POST['cre'][$i], 'cie'=>$_POST['cie'][$i], 'see'=>$_POST['see'][$i]);
       array_push($records, $record);
      $i++;
    }

    $email = $_SESSION['email'];
    $sem = $_POST['sem'];
    $ayr= $_POST['ayr'];
      $id = $check['id'];
        $query = "UPDATE sem_record SET sent='n' WHERE id='".$id."'";
  
        mysqli_query($db, $query);

    

        $query = "DELETE FROM academic_record WHERE sem_id='".$id."'";
  
        mysqli_query($db, $query);


    foreach($records as $r){
        $email = mysqli_real_escape_string($db, $_SESSION['email']);
        $sem = mysqli_real_escape_string($db, $r['sem']);
        $ayr = mysqli_real_escape_string($db, $r['ayr']);
        $cti = mysqli_real_escape_string($db, $r['cti']);
        $ccd = mysqli_real_escape_string($db, $r['ccd']);
        $atd = mysqli_real_escape_string($db, $r['atd']);
        $cre = mysqli_real_escape_string($db, $r['cre']);
        $cie = mysqli_real_escape_string($db, $r['cie']);
        $see = mysqli_real_escape_string($db, $r['see']);

        $query = "INSERT INTO academic_record (email, sem, ayr, cti, ccd, atd, cre, cie, see, sem_id) 
          VALUES('$email', '$sem', '$ayr', '$cti', '$ccd', '$atd', '$cre', '$cie', '$see', '$id')";
  
        mysqli_query($db, $query);

}


    }else{
      



    $i = 0;
    $records = array();
    foreach($_POST['cti'] as $cti){
      $record = array('sem'=>$_POST['sem'], 'ayr'=>$_POST['ayr'], 'cti'=>$_POST['cti'][$i], 'ccd'=>$_POST['ccd'][$i], 'atd'=>$_POST['atd'][$i], 'cre'=>$_POST['cre'][$i], 'cie'=>$_POST['cie'][$i], 'see'=>$_POST['see'][$i]);
       array_push($records, $record);
      $i++;
    }

    $email = $_SESSION['email'];
    $sem = $_POST['sem'];
    $ayr= $_POST['ayr'];

        $query = "INSERT INTO sem_record (email, sem, ayr, sent) 
          VALUES('$email', '$sem', '$ayr', 'n')";
  
        mysqli_query($db, $query);


        $query = "SELECT id FROM sem_record WHERE email='$email' AND sem='$sem' AND ayr='$ayr'";

          $results = mysqli_query($db, $query);
          $a = mysqli_fetch_assoc($results);
          $id = $a['id'];


    foreach($records as $r){
        $email = mysqli_real_escape_string($db, $_SESSION['email']);
        $sem = mysqli_real_escape_string($db, $r['sem']);
        $ayr = mysqli_real_escape_string($db, $r['ayr']);
        $cti = mysqli_real_escape_string($db, $r['cti']);
        $ccd = mysqli_real_escape_string($db, $r['ccd']);
        $atd = mysqli_real_escape_string($db, $r['atd']);
        $cre = mysqli_real_escape_string($db, $r['cre']);
        $cie = mysqli_real_escape_string($db, $r['cie']);
        $see = mysqli_real_escape_string($db, $r['see']);

        $query = "INSERT INTO academic_record (email, sem, ayr, cti, ccd, atd, cre, cie, see, sem_id) 
          VALUES('$email', '$sem', '$ayr', '$cti', '$ccd', '$atd', '$cre', '$cie', '$see', '$id')";
  
        mysqli_query($db, $query);

}
  }


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
    <title>Academic Record</title>

    <script type="text/javascript">
      



function openModal(){
    modal = document.getElementById("modal");
    modal.classList.add("is-active");
}

function closeModal(){
    modal = document.getElementById("modal");
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
function addSubject(){
   // e.preventDefault();


     var node = document.createElement("tr");
     node.innerHTML = `<td>
                            <div class="field">
                                  <p class="control">
                                    <input class="input" type="text" placeholder="Name" name="cti[]" />
                                  </p>
                                </div>
                        </td>
                        <td>
                            <div class="field">
                                  <p class="control">
                                    <input class="input" type="text" placeholder="Code" name="ccd[]">
                                  </p>
                                </div>
                        </td>
                        <td>
                            <div class="field">
                                  <p class="control">
                                    <input class="input" type="text" placeholder="%" name="atd[]">
                                  </p>
                                </div>
                        </td>
                        <td>
                            <div class="field">
                                  <p class="control">
                                    <input class="input" type="text" placeholder="Credits" name="cre[]">
                                  </p>
                                </div>
                        </td>
                        <td>
                            <div class="field">
                                  <p class="control">
                                    <input class="input" type="text" placeholder="CIE" name="cie[]">
                                  </p>
                                </div>
                        </td>
                        <td>
                            <div class="field">
                                  <p class="control">
                                    <input class="input" type="text" placeholder="SEE" name="see[]">
                                  </p>
                                </div>
                        </td>`;
document.getElementById("t1").appendChild(node);

                        
}

function addRecord(){

document.getElementById('sem').value = '';
document.getElementById('ayr').value = '';

document.getElementById("t1").innerHTML = `<thead>
                      <tr>
                        <th>Course Title</th>
                        <th>Course Code</th>
                        <th>Attendance</th>
                        <th>Credits</th>
                        <th>CIE</th>
                        <th>SEE</th>
                      </tr>
                      </thead>`;
  openModal(); 
  addSubject();
}
        function putError(str){
            document.getElementById('errors').innerHTML = "<div class='notification is-danger'>" + str + "</div>";

            setTimeout(function(){
                document.getElementById('errors').innerHTML = '';
            }, 1000);
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

    <section class="hero is-white is-fullheight">
        <div class="hero-body">
          <div class="container"> 
                
                    <h1 class="has-text-centered is-size-3 has-text-weight-bold">Academic Record</h1>
                    <button class="button is-warning" style="float:right;" onclick="addRecord();">+ Add</button>

                    <br/>
                        
                    <table class="table" style="width: 100%;">
                        <thead>
                          <tr>
                            <th>S No</th>
                            <th>Semester</th>
                            <th>Academic Year</th>
                            <th>Actions</th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php


                                  $query = "SELECT * FROM sem_record WHERE email='".$_SESSION['email']."'";

                                  $results = mysqli_query($db, $query);
                                  $i = 1;
                                  while ($row = mysqli_fetch_assoc($results)) {


                                      echo "<tr>
                            <td>".$i."</td>
                            <td>".$row['sem']."</td>
                            <td>".$row['ayr']."</td>
                            <td colspan='2'>";

                              if($row['signed']=='n'){
                             echo" <a class='button is-small is-danger' href='academic_record.php?r=".$row['id']."'>Remove</a>";

                             echo " <a class='button is-small is-primary' href='academic_record.php?e=".$row['id']."'>Edit</a>";

                             echo " <a class='button is-small is-primary' href='academic_record.php?p=".$row['id']."'>Send to proctor</a>";

                             }else{
                              echo "<a class='button is-small is-primary' href='academic_record.php?s=".$row['id']."'>Show</a>";
                             }


                          echo"</td>
                          </tr>";

                          $i++;
                                  }



                          ?>
                        </tbody>
                      </table>
           
          </div>
        </div>
      </section>

      <div class="modal" id="modal">
          <div class="modal-background"></div>
          <div class="modal-card" style="width: 1100px;">
            <header class="modal-card-head">
              <p class="modal-card-title">Record details</p>
              <button class="delete" aria-label="close" onclick="closeModal()"></button>
            </header>
            <section class="modal-card-body">
              <div id="errors"></div>
              <form method="post" action="academic_record.php">
                  <div class="field">
                    <label class="label">Semester
                      <p class="control">
                        <input class="input" type="text" placeholder="Semester" name="sem" id="sem">
                      </p>
                    </label>
                    </div>
                    <div class="field">
                        <label class="label">Academic Year
                          <p class="control">
                            <input class="input" type="text" placeholder="Semester" name="ayr" id="ayr">
                          </p>
                        </label>
                        </div>
                    <table class="table" id="t1">
                      <thead>
                      <tr>
                        <th>Course Title</th>
                        <th>Course Code</th>
                        <th>Attendance</th>
                        <th>Credits</th>
                        <th>CIE</th>
                        <th>SEE</th>
                      </tr>
                      </thead>
                    </table>
                                  <a class="button is-primary is-pulled-right" onclick="addSubject();">Add Subject</a>
<br/><br/>
            <footer class="modal-card-foot">
              <input type="submit" class="button is-success" value="Save changes" name="submit"/>
              <button class="button" onclick="closeModal()">Go Back</button>

            </footer>
              </form>

            </section>

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


if(isset($_GET['s'])){

      $query = "SELECT * from sem_record WHERE id='".$_GET['s']."'";


     $results = mysqli_query($db, $query);
$rec = mysqli_fetch_assoc($results);

      echo "<div class='columns'>
            <div class='column'><span class='has-text-weight-bold'>Semester:</span> ".$rec['sem']."</div>
            <div class='column'><span class='has-text-weight-bold'>Academic Year:</span> ".$rec['ayr']."</div>
        </div>";



      $query = "SELECT * from academic_record WHERE sem_id='".$_GET['s']."'";


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
    echo "<hr/>";

      echo "<script>openModala();</script/>";




}




?>
    </section>
    <footer class="modal-card-foot">

      <button class="button" onclick="closeModala();">Go Back</button>
    </footer>
  </div>
</div>
       


          <?php
  if(isset($_GET['e'])){
      echo "<script>openModal();</script/>";
      // echo "<script>putError('hello');</script>";
            $query = "SELECT * from sem_record WHERE id='".$_GET['e']."'";
            $results = mysqli_query($db, $query);
              $sem_record = mysqli_fetch_assoc($results);

              echo "<script>document.getElementsByName('sem')[0].value = '".$sem_record['sem']."';</script>";
              echo "<script>document.getElementsByName('ayr')[0].value = '".$sem_record['ayr']."';</script>";

      $query = "SELECT * from academic_record WHERE sem_id='".$_GET['e']."'";

         $results = mysqli_query($db, $query);

            $j = 0;
        while ($row = mysqli_fetch_assoc($results)) {
           // array_push($subjects, array("cti"=>$row["cti"],"ccd"=>$row["ccd"],"atd"=>$row["atd"],"cre"=>$row["cre"],"cie"=>$row["cie"],"see"=>$row["see"]));
            echo "<script>addSubject();</script>";
            echo "<script>document.getElementsByName('cti[]')[".$j."].value = '".$row["cti"]."';</script>";
            echo "<script>document.getElementsByName('ccd[]')[".$j."].value = '".$row["ccd"]."';</script>";
            echo "<script>document.getElementsByName('atd[]')[".$j."].value = '".$row["atd"]."';</script>";
            echo "<script>document.getElementsByName('cre[]')[".$j."].value = '".$row["cre"]."';</script>";
            echo "<script>document.getElementsByName('cie[]')[".$j."].value = '".$row["cie"]."';</script>";
            echo "<script>document.getElementsByName('see[]')[".$j."].value = '".$row["see"]."';</script>";            
              $j++;
        }
}


  if(isset($_GET['p'])){

    $query = "UPDATE sem_record SET sent='y' WHERE id='".$_GET['p']."'";
    mysqli_query($db, $query);

}

?>

</body>
</html>