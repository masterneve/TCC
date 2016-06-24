<?php
     error_reporting(E_ERROR | E_WARNING | E_PARSE); 
     include '../model/dao.php';
     $opcao = $_POST['opcao'];
          
             $nome = $_POST['nome'];
             $desc = $_POST['descricao'];
             $valor = $_POST['valor'];
             $tipo = $_POST['tipo'] ;
             $url = $_POST['url'] ;
             $idprod = $_POST['idprod'];
             $status = $_POST['novo'];
             $idcompra = $_POST['idcomp'];
             $url_temp = $_POST['url_temp'];
            

           if(isset($_FILES['url']))
         {

            date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
       
            $ext = strtolower(substr($_FILES['url']['name'],-4)); //Pegando extensão do arquivo
            $novo_nome = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = '../imagens/'; //Diretório para uploads
       
            move_uploaded_file($_FILES['url']['tmp_name'], $dir.$novo_nome); //Move a imagem para a pasta destino
            $url = '../../imagens/'.$novo_nome;
           }
         
           else{
              echo 'Não foi possivel gravar a imagem';
           
           }
          switch ($opcao) {
            case 1:
              addProduto($nome, $desc, $valor, $url, $tipo);
              break;
            
            case 2:

              atualizarProduto($nome, $desc, $valor, $url, $tipo,$idprod);
              break;

            case 3:
              removerProduto($idprod);
             
              break;
           
           case 4:
              alteraStatus($status, $idcompra);
             
              break;
          } 
          

  
?>