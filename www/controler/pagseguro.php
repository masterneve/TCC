<?php
function pagseguro($carrinho)
{   
    include_once'../pagseguro/PagseguroLibrary/config/PagSeguroConfig.class.php';
	$paymentRequest = new PagSeguroPaymentRequest();  
	$paymentRequest->addItem('0001', 'Notebook', 1, 2430.00);  
	$paymentRequest->addItem('0002', 'Mochila',  1, 150.99);  
	
	$sedexCode = PagSeguroShippingType::getCodeByType('SEDEX');  
	$paymentRequest->setShippingType($sedexCode);  
	$paymentRequest->setShippingAddress(  
	  '01452002',  
	  'Av. Brig. Faria Lima',  
	  '1384',  
	  'apto. 114',  
	  'Jardim Paulistano',  
	  'São Paulo',  
	  'SP',  
	  'BRA'  
	);

}


?>