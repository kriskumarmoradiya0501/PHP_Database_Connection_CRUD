<?php
// Check if 'id' parameter is set in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Proceed with deletion or other actions using the $id variable
    require "main.php";
    $obj = new db();
    $r = $obj->deleteproduct($id);
    if($r > 0) {
        header("location:productinfo.php");
    }
} else {
    echo "No 'id' parameter provided.";
}
?>
