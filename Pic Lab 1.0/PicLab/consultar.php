<?php

$emailbd = $_POST['email'];
$passbd = $_POST['pass'];

if (!empty($emailbd)||!empty($passbd)){
     $host = 'basededatospiclab.c4uosfht3hej.us-east-1.rds.amazonaws.com';
    $dbUsername = 'jjgb';
    $dbPassword = 'JJGB6572019';
    $dbName = 'piclab';

    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbName);
    if(mysqli_connect_error())
    {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }else
    {
        $SELECT = "SELECT id_user, nombre, emailbd, passbd From user Where emailbd = ? And passbd = ? ";
        //$SELECT2= "SELECT id_user From user Where emailbd = ? Limit 1";


       /* $resultados=mysqli_prepare($conn,$SELECT);
		   
        $ok=mysqli_stmt_bind_param($resultados, 'ss', $emailbd, $passbd);
               
        $ok=mysqli_stmt_execute($resultados);*/

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('ss',$emailbd, $passbd);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        
        
        if($rnum == 0){
            
            header("Location: 404/404.html");
            
        } else{
         
            $stmt->bind_result($id_user,$nombre,$emailbd, $passbd);
    
           /*  mysqli_stmt_bind_result($resultados,$id_user,$nombre,$emailbd, $passbd);  */
             
             session_start();

             while ($stmt->fetch()) {
                
              $_SESSION['email']= $emailbd;
              $_SESSION['id']= $id_user;
              $_SESSION['nombre']= $nombre;
              
             }
  
              header("Location: index.php");   

             
              
            
        }

  
    
        $conn->close();
        
    }
}else
{
    echo "Llene los campos...";
    die();
}
?>

