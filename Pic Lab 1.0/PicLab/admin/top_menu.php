<?php

    if(isset($_SESSION['email'])){

      $nom = $_SESSION['nombre'];

    }
    ?>


<head>
    <link rel="stylesheet" href="css/estilosHeader2.css">
    </head>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:white; border-style:none;">
     <div class="row">
       <div class="col col-xs-4 col-md-3">
          <a class="navbar-brand" href="#"><img src="img/LOGO 2Km.jpg" class="logo-brand" alt="logo"></a>      
       </div>
       <div class="col col-xs-8 col-md-9">
         <div class="nav navbar-nav navbar-right">
          <ul class="nav navbar-nav" >    
            <li class="active"><a href="#"                    style="background-color:white; border-style:none;"><i class='glyphicon glyphicon-user'>         </i> Usuario</a></li>
            <li class="active"><a href="../index.php"            style="background-color:white; border-style:none;"><i class='glyphicon glyphicon-picture'>      </i> Galería</a></li>
            <li class="active"><a href="bannerlist.php" style="background-color:white; border-style:none;"><i class='glyphicon glyphicon-picture'>      </i> Eliminar y Modificar</a></li>
            <li class="active"><a href="../logout.php"       style="background-color:white; border-style:none;"><i class='glyphicon glyphicon-remove-circle'></i> Salir</a></li>            
          </ul>      
        </div>
       </div>
     </div>
    </nav>
  

  <br>