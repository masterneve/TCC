<html>  
<head>
 <style>
section .ofertas img{
     width: 80px;
     height: 80px;
     
 }

section .ofertas a{
    text-decoration:none;
      
}
section .ofertas{
    margin-left: 30px;
}
section .ofertas input:hover{
 cursor: pointer;
 background-color: green;
 color:white;
 border: 2px solid black;
}
.ofertas input{
    background-color:white;
    border:2px solid green  ;
    font-size: 20px;
    font-family:Bangers;
}
p{

font-size: 20px;
color: green;
}
 </style>   
 </head>    
    <body>
<?php
  include 'conexao.php';
        $query = "SELECT * from produto ORDER BY valor ASC limit 3";
        echo"<p>Ofertas</p>";   
        $result = mysqli_query($db, $query);
        if ($result) {
                while($row = mysqli_fetch_assoc($result)) {
                    
                echo '<section  class="ofertas"><img src="'.$row['url_imagem'].'"/>'.'<br>'.$row['nome'].'<br>'.'Tipo :'.$row['tipo'].'<br>'.
                'R$:'.number_format($row['valor'],2,",",".").'<br>'.'<a class="adicionar" href="../index/carrinho.php?acao=add&id='.$row['id'].'"><input type="submit" value="Adicionar"></a></section>';
                }
            }else {
                echo "Erro ao carregar itens:";
            }
            mysqli_close($db);
?>
 </body>
</html>