<?php
     error_reporting(E_ERROR | E_WARNING | E_PARSE); 
    include '../model/conexao.php';
    include '../model/dao.php';
     
     $nome     = $_POST['nome'];
     $cep      = $_POST['cep'];
     $rua      = $_POST['rua'];
     $bairro   = $_POST['bairro'];
     $numero   = $_POST['numero'];
     $telefone = $_POST['telefone'];
     $username = $_POST['user'];
     $pass     = $_POST['pass'];
    // $pass     = md5($_POST['pass']);
     $opcao   = $_POST['opcao'];
     $usuario = $_POST['usuario'];
    
     
   
     
    // Validar os campos ...
       


       
        
         if($username == 'admin' || $username == 'Admin'){
            echo '<script>alert("Não pode ser cadastrado como admin...");</script>';
            
           
         }
         
        
         else{
            
              $query = "SELECT * from usuario WHERE usuario = '$username'";
              $result= mysqli_query($db, $query);
           
         
              while($row = mysqli_fetch_assoc($result)) {
              if($username == $row['usuario']){
                  echo"<script>alert('Usuario existente.')</script>";
                  $contador ++;     
              }
                  
              }
         }  
              
       
             
         
      //Testa alterar 
    
                
  
                 switch ( $opcao ) {
                   case 'adicionar':
                        $temp = $username;
                        add($nome, $cep, $rua, $bairro, $numero, $telefone, $temp, $pass);
                      break;
                   case 'atualizar':
                      atualizar($usuario,$nome, $cep, $rua, $bairro, $numero, $telefone);
                      break;
                   case 'deletar' :
                      remover($usuario); 
               
            }
        
             
     
?>