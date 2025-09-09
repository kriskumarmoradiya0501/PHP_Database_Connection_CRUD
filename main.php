<?php
class db 
{
    var $con;



    function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=demo';
        $uname = 'root';
        $pwd = '';
        // your database all variable nme
        $this->con = new PDO($dsn, $uname, $pwd);
    }

    function save_product_info($a, $b)
    {
      //  echo $a;
      //  echo $b; 
            //here you need to write your original variable name
            //here you need to create dummy variable like :a,:b etc;
      $qry = "insert into product(pname, pdesc) values(:pname,:pdesc)";
      $stmt = $this->con->prepare($qry);
      //ahiya dummy varible ne $a $b $c etc ma bind karvana
      $stmt->bindParam(':pname', $a);
      $stmt->bindParam(':pdesc', $b);
       
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
      $qry = "select *from product";
      $stmt = $this->con->prepare($qry);
      // a badhu execute karse
      $stmt->execute();
      // ano fetchall means akhu table fatch kari lese akj varma
      $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
      // $r ni andar line by line array from ma badhu fetch karse and apade ane display karavi shakiye padi jaruriyat pramane ahiya a product.php ma display thai chhe niche

      return $r;
    }
    function displayproduct($id)
    {
      //it display product specificly.. accorcing to id if you have any thing to compair you need to give here quary

      $qry = "select *from product where id=:a";
      $stmt = $this->con->prepare($qry);
      // here we bind the :a value to $id
      $stmt->bindParam(":a", $id);
      $stmt->execute();
      //it fatch only specific value which you want to display
      $r = $stmt->fetch(PDO::FETCH_ASSOC);
      return $r;
    }


    function updateproduct($a, $b, $c)
    {
      
      //echo $a; echo $b; echo $c;
      // it is update quary you need to specify all the variable you need to update in your program
      $qry = "update product set pname=:a, pdesc=:b where id=:c";
      $stmt = $this->con->prepare($qry);
      $stmt->bindParam(":a", $a);
      $stmt->bindParam(":b", $b);
      $stmt->bindParam(":c", $c);
      $stmt->execute();
      $r = $stmt->rowCount();
      return $r;
   
    }
    
    
    function deleteproduct($id)
{
    // here you need to specify all the variable accordingly to delete variables
    $qry = "DELETE FROM product WHERE id = :id";
    $stmt = $this->con->prepare($qry);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->rowCount();
}
    
    /*
    function display()
    {
      $qry = "select * from product";
      $stmt = $this->con->prepare($qry);

      $stmt->bindParam(':pname', $a);
      $stmt->bindParam(':pdesc', $b);

      $stmt->execute();
      $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $r;
    }






    function  update_record($id, $pname, $contactno, $bgp, $disease)
    {
        $qry = "update info set name = :a,contactno = :b where id = :c";
       
        $stmt = $this->con->prepare($qry);
       
        $stmt->bindParam(':a', $pname);
        $stmt->bindParam(':b', $contactno);
        $stmt->bindParam(':c', $id);
        
        $stmt->execute();

        $r = $stmt->rowCount();
        return $r;



}   */

}


?>