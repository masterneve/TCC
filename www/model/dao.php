<?php 
    include "conexao.php";
    function add($nome, $cep, $rua, $bairro, $numero, $telefone, $temp, $pass){
   include "conexao.php";
                    
                    $sql =  $db->query ("INSERT INTO usuario (`usuario`, `pass`, `cep`, `rua`, `bairro`, `numero`, `telefone`, `nome`, `sobrenome`, `id`) VALUES ('$temp', '$pass', '$cep', '$rua,', '$bairro',' $numero','$telefone','$nome',' ', NULL)");
                  
                    if ($sql) {
                        echo "<script>alert( 'Cadastro feito com sucesso....!' ); location = '../view/index/index.php';</script>";
                       
                        
                    } else {
                       echo "<script>alert( 'Erro ao cadastrars usuario....!' ); location = '../view/index/index.php';</script>";
                    }
                    
                    mysqli_close($db);
                      
         }
      
    function remover($usuario){
        include "conexao.php";
                  $sql =  $db->query ("DELETE from usuario where usuario = '$usuario'");
           
                   echo "<script>alert( 'Removido com sucesso....!' ); location = '../view/index/painelAdmin.php';</script>";
         }
    function atualizar($usuario, $nome, $cep, $rua, $bairro, $numero, $telefone){
     include "conexao.php";
                    
                    $sql =  $db->query ("UPDATE `usuario` SET `cep`= '$cep', `rua`= '$rua', `bairro`='$bairro', `numero`='$numero', `telefone`='$telefone', `nome`='$nome' WHERE usuario ='$usuario'");
                   
                    if ($sql) {
                        echo "<script>alert( 'Alterado com sucesso....!' ); location = '../view/index/index.php';</script>";
                       
                        
                    } else {
                       echo "<script>alert( 'Erro ao alterar usuario....!' ); location = '../view/index/index.php';</script>";
                    }
                    
                    mysqli_close($db);
         //  echo 'Atualizar :'.$user;    
         }
          function atualizarProduto($nome, $des, $valor, $url, $tipo,$idprod){
            include "conexao.php";
                     $sql =  $db->query ("UPDATE `produto` SET `nome`= '$nome', `descricao`= '$desc', `valor`='$valor', `url_imagem`='$url', `tipo`='$tipo' WHERE id ='$idprod'");
                   
                    if ($sql) {
                        echo "<script>alert( 'Alterado com sucesso....!' ); location = '../view/index/painelAdmin.php';</script>";
                       
                        
                    } else {
                       echo "<script>alert( 'Erro ao alterar produto....!' ); location = '../view/index/painelAdmin.php';</script>";
                    }
                    
                    mysqli_close($db);  
         }


          function removerProduto($idprod){
            include "conexao.php";
                  $sql =  $db->query ("DELETE FROM `produto` WHERE  id = '$idprod'");
           
                   echo "<script>alert( 'Removido com sucesso....!' ); location = '../view/index/painelAdmin.php';</script>";
         }   
        
     
          function addProduto($nome, $des, $valor, $url, $tipo){
            
              include 'conexao.php';
                    $sql =  $db->query ("INSERT INTO `produto` ( `nome`, `descricao`, `valor`, `url_imagem`, `tipo`) VALUES ( '$nome', '$des', '$valor','$url' ,'$tipo' )");
                  
                    if ($sql) {
                      echo "<script>alert( 'Produto cadastrado com sucesso....!' ); location = '../view/index/painelAdmin.php';</script>"; 
                       
                        //header('location:../view/index/painelAdmin.php');
                        
                    }


                    else {
                        echo "<script>
                        alert( 'Erro ao cadastrar....!' ); location = '../view/index/painelAdmin.php';
                        </script>";
                    } 
                      mysqli_close($db);
                      
         }         



         function finalizarcompra($idUser,$carrinho,$data, $checkoutUrl){

              include 'conexao.php';

                   
                      // Salva a compra
                       $sql =  $db->query ( "INSERT INTO compra (`idcompra`, `status`, `datacompra`, `dataentrega`, `id`) VALUES (NULL, 'pendente', '$data', '', '$idUser')");

                          if ($sql) {
                              //Chama a função do carrinho para gravar os produtos com o id da compra.  
                          
                              addcarrinho($carrinho,$checkoutUrl);
                            
                                }
                                   else {
                                      echo "<script>
                                      alert( 'Erro ao ao finalizar....!' ); location = '../view/index/index.php';
                                      </script>";
                                  } 
                                  
                   }
            function addcarrinho($carrinho,$checkoutUrl){                            
              include 'conexao.php';  
                                 
                                
                                 // Pega o id para salvar no carrinnho
                              $query = "SELECT idcompra from compra  ORDER BY idcompra DESC LIMIT 1 ";
                              $result= mysqli_query($db, $query);
          
                                  if ($result) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                     $idc = $row['idcompra'];
                                   }
                                    
                                 }
                                 //Fim da busca pelo idcompra
                                 
                                 //Inicio para salvar os dados da compra no carrinho.

                                 foreach($carrinho as $id => $qtd){
                                     $query = "SELECT * from produto WHERE id = '$id'";
                                     $sql =  $db->query ("INSERT INTO carrinho (`idproduto`, `idcompra`, `quantidade`) VALUES ('$id', '$idc', '$qtd')");
                                     unset($_SESSION['carrinho']);
                                    }
                                  //Finalizando a gravação do pedido e direcionando para pagamento 
                                  echo "<script>alert( 'Pedido finalizado com sucesso. Obrigado por comprar em nossa Loja ....!' )</script>";
                                  //Linha abaixo comentada por que já está funcionado o Pagseguro
                                  //echo"<script>window.location='$checkoutUrl'</script>";
                                  echo "<script> window.location = '../view/index/index.php'</script>";

                    }     


         function alteraStatus($idcompra, $status){
              
          var_dump($idcompra,$status);
            include "conexao.php";
                //arrumar depois
                     $id = $status;
                     $status = $idcompra;
                     
                     
                     
                     $sql =  $db->query ("UPDATE `compra` SET status = '$status' WHERE idcompra = '$id'");
                   
                    if ($sql) {
                        echo "Alterado com sucesso o status....";
                       
                        
                    } else {
                       echo 'Erro ao alterar status....!' ;
                    }
                    
                    mysqli_close($db);
         }  

       

      
?>

