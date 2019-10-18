<?php
$emailbd = $_POST['email'];
$passbd = $_POST['pass'];

if (!empty($emailbd)||!empty($passbd)){
    $host = 'basededatospiclab.c4uosfht3hej.us-east-1.rds.amazonaws.com';
    $dbUsername = 'jjgb';
    $dbPassword = 'JJGB6572019';
    $dbName = 'PicLab';

    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbName);
    if(mysqli_connect_error())
    {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }else
    {
        $SELECT = "SELECT emailbd From user Where emailbd= ? Limit 1";
        $INSERT = "INSERT Into user (emailbd, passbd) values (?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('s',$emailbd);
        $stmt->execute();
        $stmt->bind_result($emailbd);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        

        if($rnum==0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param('ss',$emailbd,$passbd);
            $stmt->execute();

        }else
        {
            echo "FALLO";
        }
        $stmt->close();
        $conn->close();
    }
}else
{
    echo "Llene los campos...";
    die();
}
header("Location: singUp.html");
?>

