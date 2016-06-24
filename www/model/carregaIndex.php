<html>
<head>
    <link rel="stylesheet" href="../css/produto.css">
 </head>    
    <body>
<?php
  include 'conexao.php';
        $query = "SELECT * from produto ";
        $result = mysqli_query($db, $query);
        if ($result) {
                while($row = mysqli_fetch_assoc($result)) {
                echo '<section ><img src="'.$row['url_imagem'].'"/>'.'<br>'.$row['nome'].'<br>'.'Tipo :'.$row['tipo'].'<br>'.
                'R$:'.number_format($row['valor'],2,",",".").'<br>'.'<a class="adicionar" href="../index/carrinho.php?acao=add&id='.$row['id'].'"><input type="submit" value="Adicionar"></a></section>';
                }
            }else {
                echo "Erro ao carregar intens:";
            }
            mysqli_close($db);
?>
 </body>
</html>