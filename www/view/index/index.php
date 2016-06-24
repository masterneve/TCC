<?php
    //Função responsável por remover o 'NOTICE' das variaveis/sessões vazias 
    error_reporting(E_ERROR | E_WARNING | E_PARSE); 
    
    session_start();
    
    $logado = $_SESSION['usuario'];
    	
  


?>   
<html>
   <head>
      <title>Bem Vindo!</title>
      <link rel="icon" href="http://www.pubzi.com/f/lg-Beer-glass.png" type="image/gif" sizes="16x16">
      <link rel="stylesheet" href="../css/index.css">
      <script src="../js/jquery.js"></script>
      
      <script src="../js/index.js"></script>
      <script src="../js/jquery.maskedinput.js"></script>
      
      <meta charset="utf-8">
        </head>
        <body>
            
            <!-- Preloader Central-->
            <div class="preloaderTotal">
            
            </div>
            <?php include 'topo.php' ?>
            
            <a href="#" class="bttLog">Login</a>
            <?php include 'menu.php' ?>
           
           <!--Menu lateral -->
           
           <aside>
             <ul>
                    <li class="titulo">Principais marcas</li><br>
                    <li><a href="../../model/buscaProduto.php" id="Heineken">Heineken</a></li>
                    <li><a href="../../model/buscaProduto.php" id="Stella">Stella</a></li>
                    <li><a href="../../model/buscaProduto.php" id="Coruja">Coruja</a></li>
                    <li><a href="../../model/buscaProduto.php" id="Baden Baden">Baden Baden</a></li>
                    <li><a href="../../model/buscaProduto.php" id="Seera Malte">Serra Malte</a></li>
                </ul>
                  
                 <ul>
                    <li class="titulo">Principais tipos</li><br>
                    <li><a href="../../model/buscaProduto.php" id="Trigo">Trigo</a></li>
                    <li><a href="../../model/buscaProduto.php" id="Red Ale">Red Ale</a></li>
                    <li><a href="../../model/buscaProduto.php" id="Larger">Lager</a></li>
                    <li><a href="../../model/buscaProduto.php" id="Pilsen">Pilsen</a></li>
                    <li><a href="../../model/buscaProduto.php" id="Blond Ale">Blond Ale</a></li>
                </ul>  
            </aside>
               <!-- Login -->
               
                <div id="login">
                    <div class="areaLogin">
                        
                        <a href="#" class="fechar"><img src="../../../../fechar.png"></a>
                        
                         <br><br>
                        <form id="idform" action="../../controler/validaLogin.php" method="POST">
                            <input id="user"   type="text"     name="usuario" size="22" placeholder="Usuario"/><br><br>
                            <input id="senha"   type="password" name="pass"    size="20" placeholder="Senha"/><br><br>
                            <input id="enviar" type="submit"   value="Entrar"/>
                            </form>
                            <br>
                            <a class="a" href="#" >Não sou cadastrado.</a>
                     </div>
                </div>
                         
                             <div class="cadastro">
                          <form action="../../controler/validacadastro.php" method="post">
                            
                            <fieldset>
                                
                                <legend>Cadastro de usuário</legend>
                                
                            <input type="text" name="nome" required placeholder="Nome"/>*<br><br>
                            <input id="cep" type="text" name="cep"  placeholder="CEP"/><br><br>
                            <input id="rua" type="text" name="rua"  placeholder="RUA"/><br><br>
                            <input type="text"  name="bairro"  placeholder="Bairro"/><br><br>
                            <input type="text" name="numero"  placeholder="Número"/><br><br>
                            <input id="tel" type="text" name="telefone" required  placeholder="Telefone"/>*<br><br>
                            <input type="text" name="user" maxlength="20" required  placeholder="Username"/>*<br><br>
                            <input type="password"  name="pass" maxlength="10" required placeholder="Senha"/>*<br><br>
                            <input type="password" name="rePass" maxlength="10" required  placeholder="Senha novamente"/>*<br><br>
                            <input  type="hidden" name ="opcao"  value="adicionar" />
                            <input class="cadastrar" type="submit"  value="Cadastrar" /><br><br>
                            
                            <input class="close" type="button" value="Sair" />
                            
                           </fieldset>  
                         </form>
                         

                            </div>
                    
                       
            
            <section id="central">
             
                <div class="gif"><img src="https://camo.githubusercontent.com/a1a81b0529517027d364ee8432cf9a8bd309542a/687474703a2f2f692e696d6775722e636f6d2f56446449444f522e676966"></div>
                   </section>


                   <!-- Ofertas dinamicas-->
                   <div class="borda">
                   <section id="ofertas">
                      
                   </section>
                 </div>
                     <!--     <script>
           
            jQuery.noConflict();
            jQuery(function($){
               $("input[name='telefone']").mask("(99) 9999-9999?9");
               $("input[name='cep']").mask("99999-999"); 
               $("input[name='numero']").mask("9?99999"); 
              });
            
            </script> 
              -->      
       
        <?php include 'footer.php' ?>
            
        </body>
    
  </html>