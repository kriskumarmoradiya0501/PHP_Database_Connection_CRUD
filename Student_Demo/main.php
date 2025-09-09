<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method = "get">
        student name : <input type="text" name="sname" placeholder="Enter your name">
        Student gender : <input type="radio" name="gender" value = "MALE">
        <input type="radio" name = "gender" value = "Female">
        Student DOB : <input type="date" name="dob">
        Student address : <textArea name="address" placeholder="Enter your address"></textarea>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        require "data.php";
        $obj = new db();
    ?>
    <?php
        if(isset($_REQUEST['submit']))
        {
            $a = $_REQUEST['sname'];
            $b = $_REQUEST['gender'];
            $c = $_REQUEST['dob'];
            $d = $_REQUEST['address'];
            $r = $obj->insert_info($a, $b, $c, $d);
            echo $r;
        }
    ?>

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
            echo "<td>".$row["sname"] . "</td>";
            echo "<td>".$row["gender"] . "</td>";
            echo "<td>".$row["dob"] . "</td>";
            echo "<td>".$row["address"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    ?>


</body>
</html>