 <?php 

include_once '../model/autoload.php';

$users = new Users;
$users->Logout();

header("location: ../login.php?session_end_success");



  ?>