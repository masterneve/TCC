<?php 
 error_reporting(E_ERROR | E_WARNING | E_PARSE); 
$temp_de = $_POST['de'];
$temp_ate = $_POST['ate'];
$name  = $_POST['nome'];

?>

<html>
<head>
<style type="text/css">
table {
    width: 500px;
    margin-left: -150px;
    border-collapse: collapse;
    font-size: 20px;
    margin-bottom: 50px;
   
}

th, td {
    text-align: left;
    padding: 20px;
}/*
tr:hover {
  border:2px solid black;
  cursor: pointer;
}
*/  
tr:nth-child(even){
  border: 1px solid gray;
}
.id {
    background-color: black;
    color: white;
}
</style>

	<title>Relatorio</title>
</head>
	<body>
       <table>
         <tr class="id">
	         <td>Id compra </td>
	         <td>Nome </td>
	         <td>Status </td>
	         <td>Data compra </td>
	         
         </tr>
         <?php // Corrigido a busca por data e nome dia 01-06-2016
         include '../model/conexao.php';
          //Busca por data e nome para o relatorio, retorno dessa consulta é feito via Ajax
          $query = "SELECT  compra.idcompra,compra.status, compra.datacompra, usuario.nome, usuario.id from compra INNER JOIN usuario ON compra.id = usuario.id WHERE (compra.datacompra BETWEEN  '$temp_de' AND '$temp_ate' OR usuario.nome LIKE '$name%')";
          $result = mysqli_query($db, $query);
          
            while($row = $result->fetch_assoc()) {
                  
                 $nome     = $row['nome']; 
                 $idcompra = $row['idcompra'];
	             $status   = $row['status'];
	             //Converte a data para o padrão brasileiro.
	             $datacompra= date('d-m-Y',  strtotime($row['datacompra']));
	              
	            echo'<tr>
                  <td>'.$idcompra.' </td>
                  <td>'.$nome.' </td>
	              <td>'.$status.' </td>
	              <td>'.$datacompra.'</td>
	              
                  </tr> ';
                  
                }
          
            
                mysqli_close($db);
        
                

         ?>
 <!--     
 WHERE (datacompra BETWEEN '07-04-2010' AND '27-04-2016')
SELECT usuario.nome, Orders.OrderID
FROM Customers
INNER JOIN Orders
ON Customers.CustomerID=Orders.CustomerID


-->
       </table>
	</body>
</html>

