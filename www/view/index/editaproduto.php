
<html>
   <head>
      <title>Bem Vindo!</title>
      <link rel="icon" href="http://www.pubzi.com/f/lg-Beer-glass.png" type="image/gif" sizes="16x16">
       <script src="../js/index.js"></script>
       <script >
       $(documet)ready(function());
       

       </script>
       
       <meta charset="utf-8">
        </head>
        <style type="text/css">
          .back{
          width: 400px;
          height: 300px;
          margin: 50px 0px 0px 33%;
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
          top:240px;
          height: 35px;
          height: 35px;
          left: 65.5%;
        }
        </style>
        <body>
            
          <?php include 'topo.php' ?>
       
            <?php
            error_reporting(E_ERROR | E_WARNING | E_PARSE); 
             include '../../model/conexao.php';
              $id = $_GET['id'];
             
             
              //Buscando o produto para editar
                 
                $query = "SELECT * from produto where id= '$id'   ";
                 $result= mysqli_query($db, $query);
                  if ($result) {
                  
                while($row = mysqli_fetch_assoc($result)) {
                     $nome   = $row['nome'];
                     $desc   = $row['descricao'];
                     $valor  = $row['valor'];
                     $url    = $row['url_imagem'];
                     $tipo   = $row['tipo'];
                    
            } 
                  }
              echo '<div class="back">
           <form action="../../controler/inserirProduto.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Cadastro de produto</legend>
                    <label>Nome:</label><br>
                <input type="text" name="nome" value="'.$nome.'"/><br>
                    <label>Descrição:</label><br>
                <input id="cep" type="text" name="desc" value="'.$desc.'" /><br>
                    <label>Valor:</label><br>
                     <input id="rua" type="text" name="valor" value="'.$valor.'"/><br>
                   <label>Url:</label><br>
                <input type="file"  name="url"  /><br>
                <input type="hidden"  name="url_temp" value="'.$url.'" />
                    <label>Tipo:</label><br>
                  <select name="tipo" style="font-size:20px">
                  <option >'.$tipo.'</option>
                  <option  value="Larger">Larger</option>
                  <option  value="Pilsen">Pilsen</option>
                  <option  value="Trippel">Trippel</option>
                  <option  value="Bock">Bock</option>
                  <option  value="Red Ale">Red Ale</option>
                  <option  value="Indian">Indian</option>
                </select><br><br>
                <input type="hidden"  name="idprod" value="'.$id.'"/>
                  
                
                <button class="cadastrar" type="submit" name="opcao" value="2" /> Alterar</button>
                <button class="remover" type="submit" name="opcao" value="3" > Remover</button>
                <a href="#" class="fechar"><img src="../../../../fechar.png"></a>
                
               </fieldset>  
           </form>
</div>';
?>              
          
</body>
</html>