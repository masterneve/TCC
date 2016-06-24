<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE); 

$idpedido = $_GET['id'];

?>

<html>
<head>
<style type="text/css">
table {
    border-collapse: collapse;
    width: 40%;
    font-size: 20px;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){
  background-color: #f2f2f2;
}

.id {
    background-color: #cccc00;
    color: black;
}

.voltar{
  
  text-decoration: none;
  color:red;
  padding: 10px;
  border: 2px solid black;
  font-size: 20px;
}
.voltar:hover{
   background: green;
   color: black;
}
.alterar{
  font-size: 20px;
}
</style>

  <title>Relatorio</title>
<script src="../js/jquery.js"></script>
    <script src="../js/painelAdmin.js"></script>
    
</head>
  <body>
    <?php include 'topo.php' ?>
    <center><h1>Pedido : <?php echo$idpedido;?> </h1></certer>
       <table>
         <tr class="id">
           <td>Id compra </td>
           <td>Nome </td>
           <td>Endereço</td>
           <td>Status </td>
           <td>Data compra </td>
           
         </tr>
       
         <?php 
          include '../../model/conexao.php';
          // Carrega dados cliente
          $query = "SELECT compra.idcompra,compra.status, compra.datacompra, usuario.nome, usuario.id, usuario.rua, usuario.numero from compra INNER JOIN usuario ON compra.id = usuario.id WHERE idcompra = '$idpedido' ";
          $result = mysqli_query($db, $query);
          
            while($row = $result->fetch_assoc()) {
                  
                 $nome     = $row['nome']; 
                 $idcompra = $row['idcompra'];
                 $status   = $row['status'];
                 $rua = $row['rua'];
                 $num = $row['numero'];
                 $codp = $row['idproduto'];
               //Converte a data para o padrão brasileiro.
               $datacompra= date('d-m-Y',  strtotime($row['datacompra']));
                // Dados usuario
              echo'<tr>
                  <td>'.$idcompra.' </td>
                  <td>'.$nome.' </td>
                  <td>Rua: '.$rua.'  Nº '.$num.'</td>
                  <td><select class="alterar">
                  <option >'.$status.'</option>
                  <option>Pago</option>
                  <option>Cancelado</option>
                  </select></td>
                  <td>'.$datacompra.'</td>
                
                  </tr><br> ';
                  
                }
               mysqli_close($db);
        
         ?>
           </table>

           <table>
        <tr class="id">
          <td>Item </td>
           <td>Nome </td>
           <td>Tipo </td>
           <td>Valor</td>
           <td> Quantidade</td>
           <td> Sub Total</td>

           
           
         </tr>

         <?php 
          include '../../model/conexao.php';
          // Carrega produto
          $query = "SELECT produto.nome, produto.tipo, produto.valor, carrinho.quantidade FROM produto INNER JOIN carrinho ON carrinho.idproduto = produto.id WHERE idcompra = '$idpedido'";
          $cont = 0;
          $result = mysqli_query($db, $query);
          
            while($row = mysqli_fetch_assoc($result)){
              $cont++;
              $nome = $row['nome'];
              $tipo = $row['tipo'];
              $valor = number_format($row['valor'],2,",","."); 
              $qtd =   $row['quantidade'];
              $sub =  number_format($row['valor'] * $qtd,2,',','.');
              $total += $sub;

              
              echo '
                  <tr>
                    <td>'.$cont.'</td>
                    <td>'.$nome.'</td>
                    <td>'.$tipo.'</td>
                    <td>'.$valor.'</td>
                    <td>'.$qtd.'</td>
                    <td>'.$sub.'</td>
                    </tr>';
           }

                      echo '<tr style="background-color:#cccc00">
                        <td colspan="5">Total :</td>
                        <td  colspan="3">R$'.':  '.number_format($total,2,',','.').'</td>
                      </tr>';
           
            ?>

        </table><br><br>
        <a class= "voltar" href="#">Alterar Status</a>
        <a class= "voltar" href="painelAdmin.php">Voltar</a>
        <input type="hidden" class="op" value="4">
        <input type="hidden" class="idcomp" value="<?php echo $idcompra?>">
        
  </body>
</html>

