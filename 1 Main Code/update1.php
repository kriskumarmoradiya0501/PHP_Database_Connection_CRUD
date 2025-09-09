<?php

//echo $_GET['id'];
$a = $_GET['id'];
require "main.php";
$obj = new db();
$r = $obj->displayproduct($a);
print_r($r);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- here you need to fetch value and forward it to $r as prametr for update variable which you want to update here pname and pdesc is example of it -->
<form action="#" method="get" >
        Enter Product Name:- <input type="text" name="pname" value=<?php echo $r['pname'] ?>>
        <br>
        Enter Description:- <input type="text" name="pdesc" value=<?php echo $r['pdesc'] ?> >
        <br>
        <input type="hidden" name="id" value=<?php echo $r['id'] ?> >

        <input type="submit" name="submit" value="submit" >
    </form>
</body>
<?php
if(isset($_REQUEST['submit']))
{   
    // it pass your reqasted values for update to main for update values so you need to specify here your all the variable which you want to update.
    
    $pname = $_REQUEST['pname'];
    $pdesc = $_REQUEST['pdesc'];
    $id = $_REQUEST['id'];
   // echo $pname; echo $pdesc;
// update product set pname='p1', pdesc='pdesc' where id='1'
    $r = $obj->updateproduct($pname, $pdesc, $id);
    if($r > 0)
    {
        header("location:productinfo.php");
    }
}



?>
</html>



