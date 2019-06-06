<?php 

session_start();

require_once '../model/autoload.php';

if(isset($_SESSION['user'])) {

include_once '../parts/head.php'; ?>





<?php } else {header("Location: ../view/login.php?acess_denied");}?>

<?php include_once '../parts/footer.php'; ?>