
 // Consulta dinâminca menu lateral

	$(document).ready(function(){
		$("aside a").click(function( e ){
			e.preventDefault();
			var teste = '';
		// Função do Ajax com Jquery / preloader 
			 $.ajax({
           url: $(this).attr('href'),
           type : 'POST',
             // cache : false,
           data:  'marca_tipo='+$(this).attr('id'),
             success: function(res) {
                $('#central').html(res);
                
               }
        });
      });
	});
	
	
  // Buscar produto menu superior
  $(document).ready(function(){
		$(".btt").click(function( e ){
		    $.ajax({
 		    	url : '../../model/buscaProduto.php',
 		    	data : 'marca_tipo='+$("#auto").val(),
 		    	type: 'post',
 		    	success: function(res){
 		    		 $('#central').html(res);
 		    		 
		    	},
		    });
		    $("#auto").val("");
		});
		/*
			$(this).keypress(function( e ){
		    var opcao = $("#auto").val();
		    if(opcao == "" && e.KeyCode == 13){
		    e.preventDefault();        
		    }
		    else{
		  // if(opcao != "" && e.KeyCode == 13){
		       //alert(opcao);
		    }
		});*/
			$("#comprar").click(function( e ){
		   // var opcao = $("#auto").val();
		  //  alert(opcao);
		    $("#auto").val("");
		});	
  });  
  
  
  
  
  //Efeito do login

$(document).ready(function(){
    $(".bttLog").click(function(){
         $(".bttLog").fadeOut();
        $("#login").animate({
            left: '300px',
            height: '+=65%',
            width: '+=100%'
        },"slow"),
          $(".arealogin").fadeIn(2000);


        ;

    });
     $(".fechar").click(function() {
       $("#login").animate({
            
            height: '0px',
            width: '0px'
        },"slow"),
        $(".arealogin").fadeOut(300);
       $(".bttLog").fadeIn();
        return false;
  });
});




/*  $(document).ready(function(){
   $(".bttLog").click(function() {
       
       $("#login").slideDown(1500);
       $(".arealogin").fadeIn(3000);
       
   });
   $(".fechar").click(function() {
   	   
       $("#login").slideUp(1000);
        $(".arealogin").fadeOut(500);
       
        return false;
  });
  });
*/  

 // Carrega itens centrais
	$(window).ready(function(){
	// Função do Ajax com Jquery / preloader 
			 $.ajax({
          url: '../../model/carregaIndex.php',
          success: function(res) {
          $('#central').html(res);
             },
          beforeSend: function(){
            $('.gif').css({display:"block"});
             },
          complete: function(){
             $('.gif').css({display:"none"});
  }
           
        });
      });
      
/* Cadastro de úsuario*/

$(document).ready(function() {
   $(".a").click(function(e) {
      $("#login").fadeOut(100);      
      $(".cadastro").fadeIn(500);
   });
});
$(document).ready(function() {
 $(".close").click(function(e) {
          
      $(".cadastro").fadeOut(500);
   });
});


      //Carrega ofertas

  $(window).ready(function(){
  // Função do Ajax com Jquery / preloader 
       $.ajax({
          url: '../../model/ofertas.php',
          success: function(res) {
          $('#ofertas').html(res);
             
  }
           
        });
      });
           
            
   // Bordas piscando no banner de ofertas
           $(document).ready(function(){
                $("#ofertas p").css("opacity","0.4");//define opacidade inicial
                setInterval(function() {
                       if($("#ofertas p").css("opacity") == 0){
                  $("#ofertas p").css("opacity","1");
                 }else{
                  $("#ofertas p").css("opacity","0");
                 }  }, 1000);
});        