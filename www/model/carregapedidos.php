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
   session_start();
   if((isset ($_SESSION['usuario']) == true)){
         $logado = ($_SESSION['usuario']);
      }

  include 'conexao.php';
        $selectuser = $_POST['usuario'];
        $pago = $_POST['pago'];
        switch ( $selectuser ) {
         
         case  'paineladmin':

          $query = "SELECT compra.idcompra,compra.status, compra.datacompra, usuario.nome from compra INNER JOIN usuario ON compra.id = usuario.id WHERE status = 'pendente' ORDER BY compra.idcompra desc";
          $result= mysqli_query($db, $query);
            if ($result ) {
                echo '<p>Ultimos pedidos pendentess encontrados :</p><hr>';
              while($row = mysqli_fetch_assoc($result)) {
                 $nome     = $row['nome']; 
                 $idcompra = $row['idcompra'];
                 $status   = $row['status'];
                 $date = $row['datacompra'];
                 $data = date('d/m/Y ', strtotime($date));
                 echo '<div class="retorno"><a href="../index/mostrapedidoadmin.php?id='.$row['idcompra'].'">'.'N° : '.$row['idcompra'].'--'.'NOME :'.$nome.'--'.' DATA : '. $data.'--'.'STATUS :'.$status.'</a>'.'<br>'.'</div>';
                  }
             }else {
                echo "Pedidos não encontrados!";  

              }
              
              mysqli_close($db);

             break;

                case 'paineluser':

                  $query = "SELECT compra.idcompra,compra.status, compra.datacompra, usuario.nome from compra INNER JOIN usuario ON compra.id = usuario.id WHERE usuario = '$logado'  ORDER BY compra.idcompra desc";
                  $result= mysqli_query($db, $query);
                    if ($result ) {
                        echo '<p>Ultimos pedidos encontrados :</p><hr>';
                      while($row = mysqli_fetch_assoc($result)) {
                         $nome     = $row['nome']; 
                         $idcompra = $row['idcompra'];
                         $status   = $row['status'];
                         $date = $row['datacompra'];
                         $data = date('d/m/Y ', strtotime($date));
                         echo '<div class="retorno"><a href="../index/mostrapedido.php?id='.$row['idcompra'].'">'.'N° : '.$row['idcompra'].'--'.'NOME :'.$nome.'--'.'DATA : '.$data.'--'.'STATUS :'.$status.'</a>'.'<br>'.'</div>';
                          }
                     }else {
                        echo "Pedidos não encontrados!";  

                      }
                      
                      mysqli_close($db);
                     break;

                   
                 
              }

?>