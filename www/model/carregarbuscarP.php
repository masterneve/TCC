
<html>
<head>
<style type="text/css">
.retorno{
    text-decoration: none;
    color: black;
}
.retorno:hover{
    cursor: pointer;
    color:green;
}
</style>
</head>  
<?php
    
  include 'conexao.php';
        $nome = $_POST['nomeproduto'];
        $query = "SELECT * from produto WHERE nome like'$nome%' ";
        $result= mysqli_query($db, $query);
        $retorno = 0;
        
            if (isset($result)) {
                while($row = mysqli_fetch_assoc($result)) {
                
                $retorno ++;
                echo '<a class="retorno" href="../index/editaproduto.php?acao=add&id='.$row['id'].'">Nome : '.$row['nome'].'</a><br>';
                
                }
             if($retorno == 0) {
                echo '<section ><span>Nenhum produto encontrado....</span></section>';
            }

            }
            
            mysqli_close($db);
        
    
?>

</html>