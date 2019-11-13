<?php

$emailbd = $_POST['email'];
$passbd = $_POST['pass'];

if (!empty($emailbd)||!empty($passbd)){
    $host = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'piclab';

    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbName);
    if(mysqli_connect_error())
    {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }else
    {
        $SELECT = "SELECT id_user, nombre, emailbd, passbd From user Where emailbd = ? And passbd = ? ";
        //$SELECT2= "SELECT id_user From user Where emailbd = ? Limit 1";


        $resultados=mysqli_prepare($conn,$SELECT);
		   
        $ok=mysqli_stmt_bind_param($resultados, 'ss', $emailbd, $passbd);
               
        $ok=mysqli_stmt_execute($resultados);
        
        if($ok==false){
            
            header("Location: 404/404.html");
            
        } else{
         
             mysqli_stmt_bind_result($resultados,$id_user,$nombre,$emailbd, $passbd);  
             
             session_start();

             while (mysqli_stmt_fetch($resultados)) {
                
              $_SESSION['email']= $emailbd;
              $_SESSION['id']= $id_user;
              $_SESSION['nombre']= $nombre;
              
             }
  
              header("Location: index.php");   

             
              
            
        }
     
     
    
        /* $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('s',$emailbd);
        $stmt->execute();
        $stmt->bind_result($emailbd);
        $stmt->store_result();
        $rnum = $stmt->num_rows;*/
        
        


            


      
     /*  if($rnum!=0){
                        
                 header("Location: index.php ");
              
                  }*/
  
    
        $conn->close();
        
    }
}else
{
    echo "Llene los campos...";
    die();
}
?>

