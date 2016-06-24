
    //Carrega clientes automatico
      $(window).load(function(){
        var nome = $('.nome').val();
	  		 $.ajax({
                  
                  url: '../../model/buscaUser.php',
                  success: function(res) {
                  $('#conteudoCliente').html(res);
             }
          }); 
        });

           //Busca cliente por nome
      $(document).ready(function(){
        $(".buscar").click(function(){
        var nome = $('#usuario').val();
      
         $.ajax({
                 type : 'post', 
                  data: {nome}, 
                  url: '../../model/buscaUser.php',
                  success: function(res) {
                  $('#conteudoCliente').html(res);
             }
          }); 
        });
        });


          // Carrega pedidos pendentes
        $(window).load(function(){
          var usuario = 'paineladmin';
        
         $.ajax({
                  type : 'post', 
                  url: '../../model/carregapedidos.php',
                  data: {usuario},
                  success: function(res) {
                  $('#conteudoPedido').html(res);
             }
          }); 
        });


        // Carrega pedidos pagos

        $(window).load(function(){
                  
                 $.ajax({
                          
                          url: '../../model/pedidospagos.php',
                          success: function(res) {
                          $('#conteudoPedidoPago').html(res);
                     }
                  }); 
                });



    //Carrega relatorio por data


         $(document).ready(function(){
          $(".relatorio").click(function(){
           $("#relatorio").fadeIn(); 

           });
          $(".relat").click(function(){
         
          var de = $('#de').val();
          var ate = $('#ate').val();
          var nome = $('#buscarel').val();

         $.ajax({
                  type : 'post', 
                  url: '../../controler/relatorio.php',
                  data: {de, ate, nome},
                  success: function(res) {
                  $('#conteudoRelatorio').html(res);
             }
          }); 
        });
           });
     
/*    // Carrega relatorio por nome 

      $(document).ready(function(){
        
      $(".buscar").click(function(){
         
          var nome = $('#buscarel').val();
         $.ajax({
                  type : 'post', 
                  url: '../../controler/relatorio.php',
                   data: {nome},
                  success: function(res) {
                  $('#conteudoRelatorio').html(res);
                 $('#buscarel').val('');             }
          }); 
        });
      });
  */   
    
   // Painel incluir produto
       
        $(document).ready(function (){
           $('.incluirProd').click(function(){
            $('.produto').fadeIn(800); 
            $('.busca').fadeIn(900);   
            $('.incluir').fadeOut();     
           });
       });

   
       $(document).ready(function (){
           $('#cadastrar').click(function(){
             $('.busca').fadeOut('fast'); 
             $('.incluir').fadeIn(1000);     
           });
          
           
       });
         $(document).ready(function (){
           $('.fechar').click(function(){
            $('.produto').slideUp(1000);     
           });
          
           
       });

      //Buscar produto com parametro do HTML com Ajax e Jquery
      
            $(document).ready(function(){
        
            $("#consultar").click(function(){
         
            var nomeproduto = $('#buscarP').val();
            
           
            $.ajax({
                  type : 'post', 
                  url: '../../model/carregarbuscarP.php',
                   data: {nomeproduto},
                  success: function(res) {
                  $('.retornoBusca').html(res);
             }
          });
        });
      });
 



 // fecha aba relatório



$(document).ready(function() {
   $(".fechar").click(function(e) {
      $("#relatorio").fadeOut(100);      
   });
});

//Alerta para clientes no admin
$(document).ready(function() {
   $("#buscaClientes").click(function(e) {
      $("#conteudoCliente").css("color","red");      
   });
});



       
//Alterar status do pedido


        $(document).ready(function(){
        
            $(".voltar").click(function(){
         
            var novo = $('.Alterar').val();
            var opcao = $('.op').val();
            var idcomp = $('.idcomp').val();

            
        $.ajax({
                  type : 'post', 
                  url: '../../controler/inserirProduto.php',
                  data: {novo, opcao, idcomp},
                  success: function(res) {
                    alert("Alterado com sucesso para : " + novo);
                    
                    window.location.replace("painelAdmin.php");

           }
          }); 

      });
        });
 