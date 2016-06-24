
<html>
<head>
    <link rel="stylesheet" href="../css/produto.css">
    </head>
    <body>
<?php
    
  include 'conexao.php';
        $marca = $_POST['marca_tipo'];
        $query = "SELECT * from produto WHERE nome LIKE '$marca%' OR tipo LIKE '$marca%' ";
        $result= mysqli_query($db, $query);
        $retorno = 0;
        
            if (isset($result)) {
                while($row = mysqli_fetch_assoc($result)) {
                
                $retorno ++;
                echo '<section ><img src="'.$row['url_imagem'].'"/>'.'<br>'.$row['nome'].'<br>'.'Tipo:'.$row['tipo'].'<br>'.'Descricao :'.$row['descricao'].'<br>'.
                'R$:'.number_format($row['valor'],2,",",".").'<br>'.'<a href="../index/carrinho.php?acao=add&id='.$row['id'].'"><input type="submit" value="Comprar"></a></section>';
                
                }
             if($retorno == 0) {
                echo '<section ><span>Nenhum produto encontrado....</span></section>';
            }

            }
            
            mysqli_close($db);
        
    
?>
 </body>
 </html>