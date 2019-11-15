<?php
$nom = $_POST['nombre'];
$emailbd = $_POST['email'];
$passbd = $_POST['pass'];
$passbd2 = $_POST['pass2'];

if($passbd == $passbd2) {
   
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
        
        $SELECT = "SELECT emailbd From user Where emailbd = ? Limit 1";
        $INSERT = "INSERT Into user (nombre, emailbd, passbd) values (?,?,?)";
     
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('s',$emailbd);
        $stmt->execute();
        $stmt->bind_result($emailbd);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        

        if($rnum==0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param('sss',$nom,$emailbd,$passbd);
            $stmt->execute();

           
        }else
        {
            echo "FALLO";
        }
        $stmt->close();
        $conn->close();
    }
}       else
        {
            echo "Llene los campos...";
            die();
        } header ("Location: singUp.html");
    }
 if($passbd != $passbd2){


    printf("<script>
    alert('Verifique la informacion, las contraseñas no son iguales');
    history.back();
    </script>");
}



?>

