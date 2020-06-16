
  <?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if (!isset($_SESSION['email'])) {
    header('location: login.php');
  }
  if($_SESSION['type'] == 'student'){
      include('profile_student.php');
  }elseif ($_SESSION['type'] == 'proctor') {
      include('profile_proctor.php');
  }

?>
