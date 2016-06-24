<?php
 error_reporting(E_ERROR | E_WARNING | E_PARSE); 
     session_start();
    if((!isset ($_SESSION['usuario']) == true))
    {
    	unset($_SESSION['usuario']);
    	unset($_SESSION['pass']);
      session_destroy();
  	}
    
        $logado = $_SESSION['usuario'];
    	
   if(isset($_GET['acao'])){   
   if($_GET['acao'] == 'sair'){
        session_destroy();
        header('location:index.php');
    }	
    }
       
?> 
<html>
   <head>    
    <link rel="icon" href="http://www.pubzi.com/f/lg-Beer-glass.png" type="image/gif" sizes="16x16">
    <script src="../js/jquery.js"></script>
    <script src="../js/painelAdmin.js"></script>
    <script src="../js/painelUser.js"></script>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/areausuario.css">
    <style type="text/css">
    .editar a{
      text-decoration: none;
      color:black;
      padding: 10px;
     }
     .editar{
      border: 2px solid green;
      margin-left: 170px;
     }
    </style>
  </head>
   <body>
      <?php include 'topo.php' ?>
         <nav>
             <ul>
                 <li><a class="active" href="#">Home</a></li>
                 <li><a class="buscapedidos" href="#">Pedidos</a></li>
                
                  <ul style="float:right">
                    <li class><?php echo $logado?></li>
                  <li><a href="?acao=sair">Sair</a></li>
                  </ul>
             </ul>     
         </nav>  
            
             <div id="conteudoPedido">
                 <p>Pedidos Pendentes</p><hr>
             </div> 
             <div id="dadoscad">
                 <p>Dados cadastrais</p><hr>
                 <?php
                 include '../../model/conexao.php';
              
                $query = "SELECT * from usuario where usuario= '$logado' ";
                 $result= mysqli_query($db, $query);
                  if ($result > 0) {
                  
                while($row = mysqli_fetch_assoc($result)) {
                     $nome     = $row['nome'];
                     $cep      = $row['cep'];
                     $rua      = $row['rua'];
                     $bairro   = $row['bairro'];
                     $numero   = $row['numero'];
                     $telefone = $row['telefone'];
                     $username = $row['user'];
                     $pass     = $row['pass'];
                      
              
            } 
                  }
                  
                  echo '<span>Nome :'.$nome.'</span><br>
                          <span>CEP:'.$cep.'</span><br>
                          <span>RUA :'.$rua.'</span>.', '.'.$numero.'<br>
                          <span>Bairro :'.$bairro.'</span><br>
                          <span>Tel :'.$telefone.'</span><br><br>
                          <span class="editar"><a href="editarUser.php?user='.$logado.'">Editar</a></span>
                          <span></span>
                  
                  ';
                  
                 ?>
             </div>  
             <!--<div id="perguntasRecentes">
                <p>Perguntas Recentes</p><hr>
                 -->
             </div>
   </body>
  
   <script type="text/javascript" >
         // Carrega pedidos
      
      $(document).ready(function(){
          $('.buscapedidos').click(function(){
           $.ajax({
            
             url: '../../model/buscarUser.php',
             sucesss: function(data){
                   $('#conteudoPedido').html(data);
             }
                  
            });
      });
      });
   </script>
</html>