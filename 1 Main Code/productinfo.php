<?php
require "main.php";
$obj = new db();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <!-- here you need to specify all the variable for take input from users  -->
    <form action="#" method="get" >
        Enter Product Name:- <input type="text" name="pname" >
        <br>
        Enter Description:- <input type="text" name="desc" >
        <br>
        <input type="submit" name="submit" value="submit" >
    </form>
</body>
<!-- if there is specifide that you have to search variables than you need this button outherwise coment it -->
<a href="search.php"><button>Search</button></a>

<?php
if(isset($_REQUEST['submit']))
{   
    // it is for the veriable that you want to pass and store in data base. here you need to specify the name of your input time name  in sqar brackets

    $a = $_REQUEST['pname'];
    $b = $_REQUEST['desc'];
    // echo $a; echo $b;
    // here you need to pass parameters like $a,$b you may have $c,$d,$n..
    $r = $obj->save_product_info($a, $b);
    echo $r;
    if($r > 0)
    {
        // it gives use reuslt that the data is saved of this not come it means there is some mistakes
        echo "product information are saved";
    }
}

?>
<!-- below code is for display table of inserted valuse in tabler form you can give here delete and update line to with help of them you can directly delete or update that table -->
<?php
// 
$r = $obj->display();
//print_r($r);
echo "<table border=1>";
echo "<tr> <th> Product Name </th> <th> Product Description </th> </tr>";
// here the $r who returns values from main.php's value is initialize in $row so we your $row for print actual values 
foreach($r as $row)
{   
    echo "<tr>";
    echo "<td>".$row["pname"] . "</td>";
    echo "<td>".$row["pdesc"] . "</td>";
    echo "<td> <a href=update1.php?id=".$row['id'] ."> Update </a>  </td>";
    echo "<td> <a href=delete1.php?id=".$row['id'] ."> delete </a>  </td>";

    echo "</tr>";
}

echo "</table>";


?>


<?php /*
$r = $obj->display();
echo "<table>";
//print_r($r);
foreach($r as $row)
{
    echo "<tr> <td>". $row['pname'] ." </td>". "<td>" .$row['pdesc'] ."</td>";
   echo "<td> <a href=update.php?id=". $row['id']. "> update </a> </td>";
    echo "</tr>";
} */
?> 
</html>
