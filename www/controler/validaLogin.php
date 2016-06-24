<?php
     
      session_start();
      include '../model/conexao.php';
      $user = $_POST["usuario"];
      $pass = $_POST["pass"];

       
        $query = "SELECT * from usuario WHERE usuario = '$user' AND pass = '$pass'";
          $result = mysqli_query($db, $query);
            while($row = $result->fetch_assoc()) {
                  
                  $_SESSION['usuario'] = $row['usuario'] ;
                  $_SESSION['idU'] = $row['id'] ;
                  
                }
                mysqli_close($db);
                
                if(isset($_SESSION['usuario'])){
                   if($_SESSION['usuario'] == "admin"){
                 
                   header("location:../view/index/painelAdmin.php");
                   }
                    else{
                   
                   header("location:../view/index/index.php");
                    }
                }
                else{
                  
                  echo "<script>alert('Usuário não cadastrado');</script>";
                   header("location:../view/index/index.php");
            
                   
                }
                
                
                
                
           /*https://web-masterneve.c9users.io/phpmyadmin/*/
?>


  
                

