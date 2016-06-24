<head>
    <style type="text/css">
        .retornop{
            margin-top:5px;
        }
        .retornop a{
            text-decoration:none;
            color:black;
        }
        .retornop a:hover{
            color:#00cc67;
        }
    </style>
</head>    
    

<?php
 error_reporting(E_ERROR | E_WARNING | E_PARSE); 
   
  include 'conexao.php';
        
          $query = "SELECT compra.idcompra,compra.status, compra.datacompra, usuario.nome from compra INNER JOIN usuario ON compra.id = usuario.id WHERE status = 'Pago' ORDER BY compra.idcompra desc";
          $result= mysqli_query($db, $query);
            if ($result ) {
                echo '<p>Ultimos pedidos pagos encontrados :</p><hr>';
              while($row = mysqli_fetch_assoc($result)) {
                 $nome     = $row['nome']; 
                 $idcompra = $row['idcompra'];
                 $status   = $row['status'];
                 $date = $row['datacompra'];
                 $data = date('d/m/Y ', strtotime($date));
                 echo '<div class="retornop"><a href="../index/mostrapedidoadmin.php?id='.$row['idcompra'].'">'.'N° : '.$row['idcompra'].'--'.'NOME :'.$nome.'--'.' DATA : '. $data.'--'.'STATUS :'.$status.'</a>'.'<br>'.'</div>';
                  }
             }else {
                echo "Pedidos não encontrados!";  

              }
              
              mysqli_close($db);
?>