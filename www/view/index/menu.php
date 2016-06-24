<?php 
   error_reporting(E_ERROR | E_WARNING | E_PARSE);  
  session_start();
    //Autentica a sessão do carrinho
   if((!isset ($_SESSION['carrinho']) == true))
     {
      $contador = 0;
     }
     else{
     $teste =($_SESSION['carrinho']);
     $contador = array_sum($teste);
     }
     //Destroi a sessão
      if(isset($_GET['acao'] )){
      if($_GET['acao'] == 'sair'){

       unset($_SESSION['usuario']);
       session_destroy();
        header('location: index.php');
      }
      if((isset ($_SESSION['usuario']) == true)){
         $logado = ($_SESSION['usuario']);
      }
   
    }
     

?>

<html>
   <head>
      <title>Bem Vindo!</title>
       <script src="../js/jquery.js"></script>
      <link rel="icon" href="http://www.pubzi.com/f/lg-Beer-glass.png" type="image/gif" sizes="16x16">
      <link rel="stylesheet" href="../css/menu.css">
      <script type="text/javascript">

    $(document).ready(function(){
         $(".painel").click(function( e ){
          var usuario = $(".choose").val();
            if(usuario == 'admin'){
          window.location.href = "painelAdmin.php";
          }
          else if(usuario == ''){
          window.location.href = "index.php";
          
          }
          else{
          window.location.href = "areaUsuario.php";
          }
          
        });
          });


      </script>

       <meta charset="utf-8">
                    
        </head>
        <body >
        <nav>
                    <span class="buscaIndex">BUSCAR :</span><input id="auto" list="lista" placeholder="Digite aqui....." ></li>
                           <datalist id="lista">
                        	<option>Heineken</option>                                        	
                            <option>Lager</option>
                        	<option>Blond Ale</option>
                        	<option>Weiz Bock</option>
                            <option>Pilsen</option>
                            <option>Indian Pale Ale</option>
                            <option>Demosele</option>
                        </datalist>
                   <input class="btt" type="submit" value="Consultar"> 
                <span class="bemvindoIndex">Bem vindo : &nbsp&nbsp<span class="logado"><a class="painel" href="#"><?php if($logado!= ''){echo $logado;}else{ echo "Visitante";}   ?></a></span> </span>
                <input type="hidden" class="choose"  value="<?php echo $logado;  ?>">
               
                <a class="logout"  href="?acao=sair">Sair</a>
               
               
                <?php
                 
                if($contador == 0){
                echo "<span class='negativo'>Carrinho vazio. : (<span>";
                }
                else{
                   
                echo "<a href='carrinho.php'><span class='positivo'>Itens do carrinho: $contador<span></a>";
                }    
                    ?> 
             </nav> 
            
          
                    
            </body>
            </html>