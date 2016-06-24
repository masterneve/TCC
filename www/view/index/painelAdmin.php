<?php
     error_reporting(E_ERROR | E_WARNING | E_PARSE); 
     session_start();
    if((!isset ($_SESSION['usuario']) == true))
    {
    	unset($_SESSION['usuario']);
    	unset($_SESSION['pass']);
  	}
    
        $logado = $_SESSION['usuario'];
    	
   if($_GET['acao'] == 'sair'){
        session_destroy();
        header('location:index.php');
    }	
 ?> 
<html>
   <head>    
    <link rel="icon" href="http://www.pubzi.com/f/lg-Beer-glass.png" type="image/gif" sizes="16x16">
    <script src="../js/jquery.js"></script>
    <script src="../js/painelAdmin.js"></script>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/painelAdmin.css">
  </head>
   <body>
      
            <?php include 'topo.php' ?>
        
         <nav>
             <ul>
                 <li><a class="active" href="painelAdmin.php">Home</a></li>
               <!--  <li><a class="pedidos" href="#">Pedidos</a></li>-->
                 <li><a class="incluirProd" href="#">Produtos</a></li>
                 <li><a id="buscaClientes" href="#">Clientes</a></li>
                 <li><a class="relatorio" href="#">Relatorios</a></li>
                  <ul style="float:right">
                    <li><a href="?acao=sair">Sair</a></li>
                    <li><span class="logado"><?php echo $logado?></span></li>
                  </ul>
             </ul>     
         </nav>  
        <div class="produto">  
          <h2>Produtos</h2>

          <!--Buscar produto com Ajax-->
          <div class="busca">

             <center> <h3>Área produto</h3></center>
              <input type="text" id="buscarP" placeholder="Digite o produto" /><br><br>
              <input type="button" id="consultar" value="Buscar"  />
              <!--Carrega a tela para cadastrar-->
              <input type="button" id="cadastrar" value="Novo cadastro"/>
              <div class="retornoBusca">Retorno</div>
           </div>  
         <div class="incluir">
              <!--Form para incluir produtos no Banco.....  -->
             <form class="incluirP" action="../../controler/inserirProduto.php"  method="POST"  enctype="multipart/form-data">
                <fieldset>
               
                 <a class="fechar" href="#">X</a><br><br>  
                 <hr>   
                 <br>
                 <label>Nome:</label>
                 </br><input type="text" required name="nome"/></br>
                 <label>Descrição:</label>
                 </br> <input type="text" required name="descricao"/></br>
                 <label>Valor:</label>
                 </br><input type="text" required name="valor"/></br>
                 <label>Url Imagem:</label>
                 </br><input type="file" required name="url"/></br>
                 <label>Tipo:</label>
                 </br>
                 <select name="tipo" style="font-size:20px">
                  <option  value="Larger">Larger</option>
                  <option  value="Pilsen">Pilsen</option>
                  <option  value="Trippel">Trippel</option>
                  <option  value="Bock">Bock</option>
                  <option  value="Red Ale">Red Ale</option>
                  <option  value="Indian">Indian</option>
                </select></br><br>
                 <input type="hidden"  name="opcao" value="1"/>
                 <input type="submit" value="Cadastrar"/>
             </fieldset>
             </form>
         </div>
        </div> 
         
             <div id="conteudoPedido">
                 <p>Pedidos Pendentes</p><hr>
             </div>
             

             <div id="conteudoCliente">
                 <p>Clientes</p>
                <!--Div para buscar o cliente --> 
                
             </div>  
             
             <div class="buscanome">
               <input type="text" id="usuario" placeholder="Digite o usuário">
               <button class="buscar">Buscar</button>
               
             </div>  
             <!--<div id="perguntasRecentes">
                 <p>Perguntas Recentes</p><hr>
               </div>-->
            <div id="conteudoPedidoPago">
                 <p>Pedidos Pagos</p><hr>
             </div>

             <div id="relatorio"> 
              <a href="#" class="fechar"><img src="../../../../fechar.png"></a>
                <h1> Relatórios</h1>
                  <!--Buscar por data -->
                 <form >
                    <p>Busca por data:</p>
                    DE: <input type="date" id="de" >
                    ATÉ: <input type="date" id="ate">
                    <input class="relat" type="button" value="Consultar"><br> 
                  <!--Buscar por nome -->
                     <p>Busca por nome:</p>
                      <input type="text" id="buscarel" placeholder="Digite o nome aqui">
                      <input class="relat" type="button" value="Consultar"> 
             </form><br><br>
                   
            
              <center><div id="conteudoRelatorio"> </div></center>
 
                       
             </div>
   </body>
  
   
</html>