<!DOCTYPE html>
<!-- MODO DE ACESSIBILIDADE -->
<?php
   session_start();
?>

<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="keywords" content="">
      <meta name="author" content="CEFET Campus Nova Friburgo">
      <link class="icon" rel="shortcut icon" type="image/png" href="img/logos/icon1.jpg">
      <title>INTEGRA+</title>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Fontes -->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="vendor/animates/animate.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" />
      
      <!-- Paginas de estilização-->
      <link rel="stylesheet" type="text/css" href="css/index.min.css">
      <link rel="stylesheet" type="text/css" href="css/header.min.css">
      <link rel="stylesheet" type="text/css" href="css/footer.min.css">
      <style type="text/css">
         .container{
            font-family: 'Josefin Sans',Helvetica,Arial,Lucida,sans-serif;
         }
         .img-integrante{
            border-radius: 50% !important;
         }
         .p{
            font-size: 18px;
         }
         .integrate{
            background-color: #f3f4f5;
            border-radius: 5px;
            border-width: 1px;
            border-style: solid;
            border-color: rgba(0,0,0,.25);
         }
         .img-integrante{
            padding: 10px;
         }
         .p-noticia{
            white-space:pre-line;
            text-overflow: ellipsis;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
         }
         #sticker{
            background-color: #f3f4f5;
            border-radius: 5px;
            border-width: 1px;
            border-style: solid;
            border-color: rgba(0,0,0,.25);
         }
      </style>
   </head>
   <body id="page-top">
      <!-- Cabeçalho -->
      <header class="cabecalho">
         <?php
            require 'header.html';
         ?>
      </header>

      <section class="container p-0" style="margin-top: 120px;">
         <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 principal">
            <div class="sobre">
               <h1 class="text-center font-weight-bold" style="color: #da320b">Sobre o Integra+</h1>
                     <p class="p">Nosso projeto consiste na criação de um site que visa a integração de pequenas farmácias, para que essas possam realizar trocas de medicamentos quando  for necessário, para que dessa maneira seja evitado o desperdício desses resíduos. 
                     </p>
                     <p class="p">Dessa forma, o prejuízo pela falta ou pelo excesso de medicamentos poderia ser ultrapassado drasticamente, trazendo maior lucro para os estabelecimentos e também para o meio ambiente, além de poder amenizar a crise vivida pelas Farmácias Populares. 
                     </p>
               <p class="p">
                  Outro ponto importante está na estruturação do site, que busca ser o mais acessível possível para qualquer portador de deficiência. Portanto, queremos dar o máximo de oportunidade para pequenos empreendedores, seja qual forem os obstáculos. A intenção é deixar todo o site o mais acessível possível, pois queremos democratizar informações para quem muitas vezes deixa de ter acesso ao seu direito de se manter informada quanto assuntos tão relevantes para o dia a dia.
               </p>
            </div>
            <h1 class="text-center my-5" style="color: #da320b;">Nossa equipe</h1>
            <div class="integrantes row">
               <div class="col-12 col-sm-12 col-md-6 col-lg-3 px-1 div-integrantes">
                  <div class="integrate">
                     <div class="circle" >
                        <img class="img-fluid img-integrante" src="./img/layout/integrante1.2.png">
                     </div>
                     <p id="1" class="p-equipe p-3 text-justify">Meu nome é Raiza Nunes Leal Pereira, tenho 16 anos e estou cursando o 2º ano do Ensino Médio Técnico no CEFET. Meus hobbies são: jogar, ler, escutar música e estudar biologia e história.</p>
                  </div>
               </div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-3 px-1 div-integrantes">
                  <div class="integrate">
                     <div class="circle" >
                        <img class="img-fluid img-integrante" src="./img/layout/integrante2.1.png">
                     </div>
                     <p id="2" class="p-equipe p-3 text-justify">Meu nome é Emanuelle Biscacio de Mattos, tenho 16 anos e estou cursando o 2º ano do Ensino Médio Técnico no CEFET. Meus hobbies são: ler, dormir e estudar biologia.</p>
                  </div>
               </div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-3 px-1 div-integrantes">
                  <div class="integrate">
                     <div class="circle" >
                        <img class="img-fluid img-integrante" src="./img/layout/integrante3.1.png">
                     </div>
                     <p id="3" class="p-equipe p-3 text-justify">Me chamo Ana Beatriz, tenho 17 anos e estou cursando o segundo ano do médio técnico integrado à informática no CEFET RJ campus Nova Friburgo. Sou monitora de biologia e pretendo me formar na área de saúde.</p>
                  </div>
               </div>
               <div class="col-12 col-sm-12 col-md-6 col-lg-3 px-1 div-integrantes">
                  <div class="integrate">
                     <div class="circle" >
                        <img class="img-fluid img-integrante" src="./img/layout/integrante4.4.png">
                     </div>
                     <p id="4" class="p-equipe p-3 text-justify">Me chamo Stephanie Andrade, tenho 17 anos e estudo no CEFET/NF. Estou no segundo ano do ensino médio neste ano de 2019, e pretendo fazer faculdade de biomedicina ou ciências biológicas.</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-12 col-md-3 col-lg-3 second">
            <div id="sticker" class="mt-5 px-2">
               <h5 class="text-center mt-2">Matérias relacionadas</h5>
               <a href="#" data-toggle="tooltip" title="Problematizando o Descarte de Medicamentos Vencidos: para onde destinar?"><p class="p-noticia">1. Problematizando o Descarte de Medicamentos Vencidos: para onde destinar?</p></a>
               <a href="#" data-toggle="tooltip" title="Problematizando o Descarte de Medicamentos Vencidos: para onde destinar?"><p class="p-noticia">2. A farmácia comunitária no Brasil: Você Precisa Saber</p></a>
               <a href="#" data-toggle="tooltip" title="Problematizando o Descarte de Medicamentos Vencidos: para onde destinar?"><p class="p-noticia">3. Vantagens Logísticas e Cadeia de Valor na Rede de Empresas: O Caso de uma Rede de</p></a>
               <a href="#" data-toggle="tooltip" title="Problematizando o Descarte de Medicamentos Vencidos: para onde destinar?"><p class="p-noticia"></p></a>
            </div>
         </div>
         </div>
      </section>
   <div class="introducao pt-5">
   </div>
      <!-- Rodapé -->
      <footer class="mt-4 footer">
         <?php
            require 'footer.html';
         ?>
      </footer>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script src="vendor/wow/wow.min.js"></script>
      <script>new WOW().init();</script>
      <script src="./js/jquery.sticky.js"></script>
      <script>
         $("#sticker").sticky({topSpacing:65});
      </script>

      <script>
        ////////RESPONSIVIDADE COM JQUERY ////////////////////
        if($(window).width() < 768){
         
        }
        if($(window).width() >= 992){
            $('#1').css('margin-bottom','12px');
            $('#2').css('margin-bottom','66px');
            $('#3').css('margin-bottom','px');
            $('#4').css('margin-bottom','45px');
        } else if($(window).width() < 992 && $(window).width() >= 576){
            $('.div-integrantes').removeClass('px-1');
            $('.div-integrantes').addClass('px-2');
            $('.div-integrantes').addClass('my-3');
            $('#2').css('margin-bottom','48px');
            $('#4').css('margin-bottom','44px');
        } else{
         $('.div-integrantes').removeClass('px-1');
         $('.integrate').addClass('px-2');
         $('.integrate').addClass('mb-3');
         $('.integrantes').addClass('m-0');
         $('.img-integrante').addClass('p-4');
         $('.p').addClass('text-justify');
         //$('#sticker').removeAttr('id');
         //$('.second').remove();
         $('.row').addClass('mx-0');
        }
        /////ACESSIBILIDADE//////////////////
        $('#mode').click(function(){
            window.location.replace('./controle/modo.php?modo=1&url=sobre.php');
        });
        $('#padrao').click(function(){
            window.location.replace('./controle/default.php?url=sobre.php');
        });
        //Modal formulários
        $('#url').attr('value','sobre.php');

        $('.slider').on('change',function(){
         var slider = $('.slider').val();
         $('#tam_range').text(slider);
        });

      <?php
         if(isset($_SESSION['modo']) && $_SESSION['modo'] != 'normal'){
               ?>
               //mudar a logo e icone
               $('.icon').attr('href','./img/logos/icon2.jpg');
               $('.logo').attr('src','./img/logos/logo5.png');

               $('body').attr('style','background-color: #15202b');
               $('.introducao').css('background-color', '#15202b');
               $('.navbar').attr('style','background-color: #1c2938; opacity: 0.9;');
               $('footer').attr('style','background-color: #1c2938');


               //texto e divs
              $('.integrate').css('background-color','rgba(104,109,131,0.6)');
               //Letras do header e footer no modo noturno
               $('.item').css('color', 'white');
               $('.item-sub').css('color', 'white');
               $('.item:hover').css('border-color','#127d9d');
               $('.item-sub:hover').css('border-color', '#127d9d');
               $('footer').css('color','white');

               //modal
               $('.modal-content').css('background-color', ' #1c2938');
               $('#mode-text').text('Modo claro');

               <?php
               if(!isset($_SESSION['cor'])){
                  ?>
                     $('.introducao').css('color','white');
                     $('.modal-content').css('color', 'white');
                     $('#cor').attr('value','#ffffff');
                     $('.p').css('color', 'white');
                     $('h1').attr('style','color: #1b88cb');
                     $('.integrate').css('color','white');
                  <?php
               }
            }
            if(isset($_SESSION['cor']) && isset($_SESSION['tam'])){
               ?>
               //Alterando valor dos inputs do MODAL
               $('.modal-content').css('color','<?= $_SESSION["cor"] ?>');
               $('#cor').attr('value','<?= $_SESSION["cor"] ?>');
               $('.slider').attr('value','<?= $_SESSION["tam"] ?>');

               $('.introducao').css('color','<?= $_SESSION["cor"] ?>');
               
               $('#tam_range').text('<?= $_SESSION["tam"] ?>');
               $('.text-size').attr('style','font-size: <?= $_SESSION["tam"] ?>px;');

               $('.p').css('color', '<?= $_SESSION["cor"] ?>');
               $('h1').attr('style','color: <?= $_SESSION["cor"] ?>');
               $('.integrate').css('color','<?= $_SESSION["cor"] ?>');

               $('.p').css('font-size','<?= $_SESSION["tam"] ?>px');
               $('.integrate').css('font-size','<?= $_SESSION["tam"] ?>px')
               <?php
               if($_SESSION['tam'] > 20){
                  ?>
                  $('.title-size').css('font-size','<?= $_SESSION["tam"] ?>px !important;');
                  $('.text-parallax').css('font-size','<?= $_SESSION["tam"] ?>px !important;');
                  <?php
               }
            }
      ?>
      </script>
   </body>
</html>