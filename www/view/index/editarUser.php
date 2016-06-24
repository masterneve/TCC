
<html>
   <head>
      <title>Bem Vindo!</title>
      <link rel="icon" href="http://www.pubzi.com/f/lg-Beer-glass.png" type="image/gif" sizes="16x16">
      <link rel="stylesheet" href="../css/index.css">
       <link rel="stylesheet" href="../css/cadastro.css">
        <script src="../js/jquery.js"></script>
     <script src="../js/jquery.maskedinput.js"></script>
          <style type="text/css">
        .back{
          width: 400px;
          height: 300px;
          margin: 50px 0px 0px 38%;
          font-size: 25px;
        }
        .back input{
          font-size: 20px;
        }
        button{
          margin-top: 10px;
         font-size: 20px;
         background-color: white;
         
        }
        .cadastrar{
          border:2px solid green;
        }
        .remover{
          border:2px solid red;
        }

        .cadastrar:hover {
          background-color: green;
          color:white;
        }
        .remover:hover {
          background-color: red;
          color: white;
        }
        .fechar img{
          position: absolute;
          top:225px;
          height: 35px;
          height: 35px;
          left: 66%;
        }
        </style>
        

        <meta charset="utf-8">
        </head>
        <script>
       
        
        </script>
        <body>
            
          <?php include 'topo.php' ?>
       
            <?php
            error_reporting(E_ERROR | E_WARNING | E_PARSE); 
             include '../../model/conexao.php';
              $idUser = $_GET['id'];
              $usuario = $_GET['user'];
             
              
                 
                $query = "SELECT * from usuario where id= '$idUser' OR usuario = '$usuario'  ";
                 $result= mysqli_query($db, $query);
                  if ($result) {
                  
                while($row = mysqli_fetch_assoc($result)) {
                     $nome     = $row['nome'];
                     $cep      = $row['cep'];
                     $rua      = $row['rua'];
                     $bairro   = $row['bairro'];
                     $numero   = $row['numero'];
                     $telefone = $row['telefone'];
                     $usuario = $row['usuario'];
                     $pass     = $row['pass'];
                      
              
            } 
                  }
              echo '<div class="back">
           <form action="../../controler/validacadastro.php" method="post">
                <fieldset>
                    <legend>Alteração de usuário</legend>
                    <label>Nome:</label><br>
                <input type="text" name="nome" value="'.$nome.'"/><br>
                    <label>CEP:</label><br>
                <input id="cep" type="text" name="cep" value="'.$cep.'" /><br>
                    <label>Rua:</label><br>
                     <input id="rua" type="text" name="rua" value="'.$rua.'"/><br>
                   <label>Bairro:</label><br>
                <input type="text"  name="bairro" value="'.$bairro.'"/><br>
                    <label>Número:</label><br>
                <input type="text" name="numero" value="'.$numero.'"/>
                <input type="hidden" name="alterar" value="alterar"/><br>
                    <label>Telefone:</label><br>
                <input id="tel" type="text" name="telefone" value="'.$telefone.'"/><br>
                 
                 <input type="hidden" name="usuario" value="'.$usuario.'">
                <button class="cadastrar" type="submit" name="opcao" value="atualizar" /> Alterar</button>
                <button class="remover" type="submit" name="opcao" value="deletar" > Remover</button>
                <a href="index.php" class="fechar"><img src="../../../../fechar.png"></a> 
                
               </fieldset>  
           </form>
</div>';

?>             


            <script>
           
           jQuery.noConflict();
            jQuery(function($){
               $("input[name='telefone']").mask("(99) 9999-9999?9");
               $("input[name='cep']").mask("99999-999"); 
               $("input[name='numero']").mask("9?99999"); 
              });
            
            </script>
</body>
</html>