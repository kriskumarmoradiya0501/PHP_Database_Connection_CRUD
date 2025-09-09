<?php
class db 
{
    var $con;



    function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=student_demo';
        $uname = 'root';
        $pwd = '';
        // your database all variable nme
        $this->con = new PDO($dsn, $uname, $pwd);
    }

    function insert_info($a, $b, $c, $d)
    {
      //  echo $a;
      //  echo $b; 
            //here you need to write your original variable name
            //here you need to create dummy variable like :a,:b etc;
      $qry = "insert into student(sname, gender,dob,address) values(:sname,:gender,:dob,:address)";
      $stmt = $this->con->prepare($qry);
      //ahiya dummy varible ne $a $b $c etc ma bind karvana
      $stmt->bindParam(':sname', $a);
      $stmt->bindParam(':gender', $b);
      $stmt->bindParam(':dob', $c);
      $stmt->bindParam(':address', $d);
       
      // ana thi code execute thase
      $stmt->execute();
      // a values return karse ke ketali row ma changes thaya etc.
      $r = $stmt->rowCount();

      //r ma badha changes return thase

      return $r;

    } 

    function display()
    {
      // a display valo block chhe ke jena thi display thase
      $qry = "select *from student";
      $stmt = $this->con->prepare($qry);
      // a badhu execute karse
      $stmt->execute();
      // ano fetchall means akhu table fatch kari lese akj varma
      $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
      // $r ni andar line by line array from ma badhu fetch karse and apade ane display karavi shakiye padi jaruriyat pramane ahiya a product.php ma display thai chhe niche

      return $r;
    }

}
?>