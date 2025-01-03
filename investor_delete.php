<?php
require 'Connection.php';
  $id = $_SESSION["id"];
  $query = "DELETE FROM investor WHERE id = $id";
  $data = mysqli_query($con,$query);
  if($data){
$_SESSION = [];
session_unset();
session_destroy();
echo "<script>
            alert('Record Deleted');
            window.location.href='index.php';
            </script>";
  }
  else{
    echo "<script>
            alert('Failed to deleted');
            window.location.href='investor_profile.php';
            </script>";
  }

?>