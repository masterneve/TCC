<head>
    <style type="text/css">
        .retorno{
            margin-top:5px;
        }
        .retorno a{
            text-decoration:none;
            color:black;
        }
        .retorno a:hover{
            color:#00cc67;
        }
    </style>
</head>    
    

<?php
 error_reporting(E_ERROR | E_WARNING | E_PARSE); 

  include 'conexao.php';
               
        $buscanome = $_POST['nome'];
        if($buscanome ==''){
        $query = "SELECT * from usuario ORDER BY nome desc limit 5";
        $result= mysqli_query($db, $query);
          if ($result ) {
              echo '<p>Ultimos clientes cadastrados :</p><hr>';
            while($row = mysqli_fetch_assoc($result)) {
               echo '<div class="retorno"><a href="../index/editarUser.php?id='.$row['id'].'">'.'NOME :'.$row['nome'].' '.' '.'USUARIO :'.$row['usuario'].'</a>'.'<br>'.'</div>';
                }
           }else {
              echo "Cliente não encontrado!";  

            }
          }  
          else{
         $query = "SELECT * from usuario where nome like '$buscanome%'";
         $result= mysqli_query($db, $query);
          if ($result ) {
              echo '<p>Ultimos clientes cadastrados :</p><hr>';
            while($row = mysqli_fetch_assoc($result)) {
               echo '<div class="retorno"><a href="../index/editarUser.php?id='.$row['id'].'">'.'NOME :'.$row['nome'].' '.' '.'USUARIO :'.$row['usuario'].'</a>'.'<br>'.'</div>';
                }
           }else {
              echo "Cliente não encontrado!";  

            }




          }
            mysqli_close($db);

?>