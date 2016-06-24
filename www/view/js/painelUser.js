   // Carrega pedidos pendentes
        $(window).load(function(){
        	var usuario = 'paineluser';
         $.ajax({
                  type : 'post', 
                  url: '../../model/carregapedidos.php',
                  data: {usuario},
                  success: function(res) {
                  $('#conteudoPedido').html(res);
             }
          }); 
        });