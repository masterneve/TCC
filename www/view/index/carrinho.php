<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE); 
  include '../../model/conexao.php';      
       session_start(); 

      if(!isset($_SESSION['carrinho'])){
         $_SESSION['carrinho'] = array();
      }
       
      //adiciona produto
      if(isset($_GET['acao'])){
            
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
           
            
            if(!isset($_SESSION['carrinho'][$id])){
               $_SESSION['carrinho'][$id] = 1;
            }
            else{
               $_SESSION['carrinho'][$id] += 1;
            }
          
         }
          
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
               unset($_SESSION['carrinho'][$id]);
            }
         }
          
         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $id => $qtd){
                  $id  = intval($id);
                  $qtd = intval($qtd);
                  if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['carrinho'][$id] = $qtd;
                  }else{
                     unset($_SESSION['carrinho'][$id]);
                  }
               }
            }
         }
       
      }
     
     
       /*Finaliza carrinho  
   if(isset($_GET['acao'])){
    if($_GET['acao'] == 'end'){
     
     $itens = $_SESSION['carrinho'];
     var_dump($itens);
     }
    
    }*/
  //Pega Usuario
  if((!isset ($_SESSION['idU']) == true))
    {
    	unset($_SESSION['idU']);
    
  	}
    else{
        $idUser = $_SESSION['idU'];
        $logado = $_SESSION['usuario'];
    	
    }  

   /* Teste para finalizar sessão completa 
   if(isset($_GET['acao'] )){
    if($_GET['acao'] == 'sair'){
        session_destroy();
        header('location: index.php');
      }
    }

    */
    //var_dump($_SESSION['idU']);
   
   
   //FINALIZAR COMPRA COM PAGSEGURO ---!

   

?>

<html>
   <head>
      <title>Bem Vindo!</title>
      <link rel="icon" href="http://www.pubzi.com/f/lg-Beer-glass.png" type="image/gif" sizes="16x16">
      <link rel="stylesheet" href="../css/index.css">
      <link rel="stylesheet" href="../css/carrinho.css">
      <meta charset="utf-8">
      <script src="../js/jquery.js"></script>
     
        </head>
        <body>
             <?php include 'topo.php' ?> 
             <?php include 'menu.php' ?>

                     <h1>Carrinho:</h1><br>
             
                <hr>

              <div id="carrinho">
              <table >
                  <thead>
                               <tr>
                                <td width="50px">Imagem</td> 
                                <td width="100px">Produto</td>
                                <td width="150px">Tipo</td>
                                <td width="79px">Quantidade</td>
                                <td width="50px">Valor</td>
                                <td width="70px">SubTotal</td>
                                <td width="70px">Remover</td>
                                
                                </tr>  
                 </thead>  
                    
                    <form class="rodape"  action="?acao=up" method="post">
                    
                     <tbody>
                         
                         <?php
                          include '../../model/conexao.php';
                          $total = 0;
                          if(count($_SESSION['carrinho']) == 0){
                           echo '<h3 class="proNeg">Nenhum produto selecionado</h3>';    
                          }
                          else{
                              foreach($_SESSION['carrinho'] as $id => $qtd){
                                 $query = "SELECT * from produto WHERE id = '$id'";
                                 $result = mysqli_query($db, $query);
                                 $ln = mysqli_fetch_assoc($result);
                                  $url = $ln['url_imagem']; 
                                  $name = $ln['nome'];
                                  $desc = $ln['descricao'];
                                  $tipo = $ln['tipo'];
                                  $valor = number_format($ln['valor'],2,",",".");
                                  $sub =  number_format($ln['valor'] * $qtd,2,',','.');
                                  $total += $sub;
                                  echo'<tr>
                                         <td><center><img src="'.$url.'" height="70px" width="60px"></center></td>
                                         <td>'.$name.'</td>
                                         <td>'.$tipo.'</td>
                                         <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'"/></td>
                                         <td>'.$valor.'</td>
                                         <td>'.$sub.'</td>
                                         <td><a href="?acao=del&id='.$id.'">X</a></td>
                                       </tr>';
                        }
                                      echo '<tr>
                                      <td colspan="5">Total :</td>
                                      <td  colspan="3">R$'.':  '.number_format($total,2,',','.').'</td>
                                      </tr>';
                                  }
                      ?>
              </tbody>
                     <tfoot>
                      <td><a class="continuar" href="index.php"/>Continuar comprando</a></td>
                      <td><input class="atualizar" type="submit" value="Atualizar carrinho"/></td>
                      
                      <td><a class="finalizar" href="../../controler/finalizacompra.php" target="_blank" />Finalizar compra</a></td>
                      
                     </tfoot>
                       </form>
             </table>
            
            </div>
                <img class="banner"src="https://stc.pagseguro.uol.com.br/public/img/banners/pagamento/todos_animado_125_150.gif" alt="Logotipos de meios de pagamento do PagSeguro" title="Este site aceita pagamentos com Visa, MasterCard, Diners, American Express, Hipercard, Aura, Elo, PLENOCard, PersonalCard, BrasilCard, FORTBRASIL, Cabal, Mais!, Avista, Grandcard, Sorocred, Bradesco, Itaú, Banco do Brasil, Banrisul, Banco HSBC, saldo em conta PagSeguro e boleto.">
                 <!-- Area de dados do cliente -->
              
                                <div class="dadosC">
                                  <span class="tt">Dados do Cliente:</span><hr><br><br>
                                <?php
                                  include '../../model/conexao.php';
                                  
                                  
                                  
                                  if($logado != null){
                                    $query = "SELECT * from usuario WHERE id = '$idUser '";
                                    $result = mysqli_query($db, $query);
                                        while($row = $result->fetch_assoc()) {
                                        $nome = $row['nome'];
                                        $rua = $row['rua'];
                                        $numero = $row['numero'];
                                        $bairro = $row['bairro'];
                                        $cep = $row['cep'];
                                        $telefone = $row['telefone'];
                                       }
                                        echo'<span>Nome :'.$nome.'</span><br>
                                             <span>Rua : '.$rua.'</span><br>
                                             <span>Número : '.$numero.'</span><br>
                                             <span>Bairro : '.$bairro.'</span><br>
                                             <span>CEP : '.$cep.'</span><br>
                                             <span>Telefone : '.$telefone.'</span>
                                             ';
                                  }
                                  else{
                                      echo "Nenhum usuário logado....";
                                  }
                                  ?> 
                                  </div> 
            
                                
        <?php include 'footer.php' ?>
            
                
           </body>
       </html>