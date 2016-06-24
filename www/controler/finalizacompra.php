<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();

$carrinho = $_SESSION['carrinho'];
$tamanho = count($carrinho);
$idUser = $_SESSION['idU'];
$data = date('Y-m-d H:i');
$logado = ($_SESSION['usuario']);
      

 include '../model/dao.php';
 require_once '../pagseguro/PagSeguroLibrary/PagSeguroLibrary.php';


		if($logado == null){

           echo "<script>alert( 'Usuário não logado!' ); location = '../view/index/index.php';</script>";
                    }
        else{

			/** INICIO PROCESSO PAGSEGURO */
			 //Instanciando o Objeto 
			$paymentRequest = new PagSeguroPaymentRequest();  
			 // Função para gerar os dados do carrinho para o objeto do Pag
			    $idcount = 1;
			    foreach($carrinho as $id => $qtd){
			    $query = "SELECT * from produto WHERE id = '$id'";
			    $result = mysqli_query($db, $query);
			    if ($result) {
			     while($row = mysqli_fetch_assoc($result)) {
			    $nome = $row['nome'];
			    $valor = $row['valor'];

			    $paymentRequest->addItem($idcount, $nome, $qtd, $valor);  
			     }
			    }
			}
			// Definindo a moeda para pagamento
			$paymentRequest->setCurrency("BRL");  
			 
			 //Iniciando a autenticação das credencias de acesso
			try {  
			  
			  $credentials = PagSeguroConfig::getAccountCredentials(); // getApplicationCredentials()  
			  $checkoutUrl = $paymentRequest->register($credentials);  
			  
			} catch (PagSeguroServiceException $e) {  
			    die($e->getMessage());  
			} 
			                                   
			// Finalizando a compra..
            finalizarcompra($idUser,$carrinho,$data,$checkoutUrl);
   
			// Redirecionando para a página de pagamento do pagseguro. 
			         
                          
             //header("Location: $checkoutUrl"); 
			
            //Não funciona em Localhost
			//$paymentRequest->setRedirectUrl("../view/idex/obrigadoPag.php"); 
			 
			
     }                            
                                  

?>

